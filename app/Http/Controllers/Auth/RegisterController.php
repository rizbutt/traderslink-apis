<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Vendor_Details;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function create(){
        $category = Categories::all();

        return view('auth.register',compact('category'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function regitser(Request $request)
    {
        $category = Categories::all();
        if (array_key_exists("type",$request->all())){
            $data = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'string', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                    'type' => ['required', 'string', 'max:2'],
                    'city' => ['required', 'string', 'max:50'],
                    'address' => ['required', 'string', 'max:255'],
                    'shop_number' => ['required', 'string', 'max:255'],
                    'dealin' => ['required', 'string', 'max:2048'],
                    ]);
                    if ($data->fails()) {
                        $errors = $data->errors();
                        return redirect()->route('newuser')
                        ->with('message', $errors);
                    }else {
                        if($request->hasFile('shop_images')){
                            $allowedfileExtension=['pdf','jpg','png','jpeg'];
                            $files = $request->file('shop_images');
                            $shopImages = [];
                            foreach($files as $file){
                                $filename = $file->getClientOriginalName();
                                $extension = $file->getClientOriginalExtension();
                                print_r($extension);
                                $check=in_array($extension,$allowedfileExtension);
                                if($check){
                                    $destinationPath = 'image/vendors/'.$request->phone;
                                    if (!file_exists($destinationPath)) {
                                        mkdir($destinationPath, 0777, true);
                                    }
                                        $profileImage = date('YmdHis'). $filename . "." . $extension;
                                        array_push($shopImages,$profileImage);
                                }
                            }
                            $images = implode (", ", $shopImages);

                        }
                        $data = $data->safe()->collect();
                        $lastId = User::create([
                            'name' => $data['name'],
                            'phone' => $data['phone'],
                            'password' => Hash::make($data['password']),
                            'type' => 1,
                            'status' => 0,
                        ])->id;
                        
                        Vendor_Details::create([
                            'user_id' => $lastId,
                            'city' => $data['city'],
                            'address' => $data['address'],
                            'shop_number' => $data['shop_number'],
                            'shop_images' => $images,
                            'dealin' => $data['dealin'],
                        ]);
                        return redirect()->route('newuser')
                        ->with('success','Vendor Submition Request Submited');
                    }

                }
                else
                {
                    $data = Validator::make($request->all(), [
                        'name' => ['required', 'string', 'max:255'],
                        'phone' => ['required', 'string', 'max:255', 'unique:users'],
                        'password' => ['required', 'string', 'min:8'],
                    ]);
                    if ($data->fails()) {
                        $errors = $data->errors();
                        return redirect()->route('newuser')
                        ->with('message', $errors);

                    } else {
                        $data = $data->safe()->collect();
                        User::create([
                            'name' => $data['name'],
                            'phone' => $data['phone'],
                           'password' => Hash::make($data['password']),
                           'type' => 2,
                           'status' => 1,
                        ]);
                        return redirect()->route('login')
                        ->with('success','You Can Login Now');
                    }
                }
        //dd($request->all());
     }
     public function login(Request $request)
     {
         $data = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:55'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($data->fails()) {
            $errors = $data->errors();
            return response()->json([
                'err' => $errors,
            ]);
        }
        $data = $data->safe()->collect();
        if (Auth::attempt($data)) {
            $session = $request->session()->regenerate();
            $token = auth()->user()->createToken('API Token')->accessToken;
            return response(['user' => auth()->user(), 'token' => $token, 'session' => $session]);
            //return redirect()->intended('dashboard');
        }
        //
         //return response(['msg' => $data]);
        
        //  if (!auth()->attempt($data)) {
        //      return response(['error_message' => 'Incorrect Details. 
        //      Please try again']);
        //  }
 
         
         
        //  return response(['user' => auth()->user(), 'token' => $token]);
 
     }  
}
