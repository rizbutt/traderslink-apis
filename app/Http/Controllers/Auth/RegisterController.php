<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Vendor_Details;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function regitser(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'type' => ['required', 'string', 'max:2'],

        ]);
        if ($data->fails()) {
            $errors = $data->errors();
            return response()->json([
                'err' => $errors,
            ]);
        } else {
            $data = $data->safe()->collect()->merge(['status' => false]);
             $checktype = $request->input('type');
             if($checktype != '1'){ 
                      User::create([
                             'name' => $data['name'],
                             'phone' => $data['phone'],
                            'password' => Hash::make($data['password']),
                            'type' => $data['type'],
                            'status' => $data['status'],
                         ]);
                    $data = $checktype.'here';
             }else {
                $lastId = User::create([
                                        'name' => $data['name'],
                                        'phone' => $data['phone'],
                                        'password' => Hash::make($data['password']),
                                        'type' => $data['type'],
                                        'status' => $data['status'],
                                    ])->id;
                                    $vendordata = Validator::make($request->all(), [
                                        'city' => ['required', 'string', 'max:50'],
                                        'address' => ['required', 'string', 'max:255'],
                                        'shop_number' => ['required', 'string', 'max:255'],
                                        'shop_images' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
                                        'dealin' => ['required', 'string', 'max:2048'],
                            
                                    ]);
                                    if ($vendordata->fails()) {
                                        $errors = $vendordata->errors();
                                        return response()->json([
                                            'err' => $errors,
                                        ]);
                                    }else {
                                        $vendordata = $vendordata->safe()->collect()->merge(['user_id' => $lastId]);
                                        Vendor_Details::create([
                                            'user_id' => $vendordata['user_id'],
                                            'city' => $vendordata['city'],
                                            'address' => $vendordata['address'],
                                            'shop_number' => $vendordata['shop_number'],
                                            'shop_images' => 'logo.svg',
                                            'dealin' => $vendordata['dealin'],
                                        ]);
                                    }
                $data = $vendordata;
             }
            
            return response()->json([
                'name' => $data,
            ]);
        }
        
        return response()->json([
            'name' => $data,
        ]);
    //     return (new PlayerResource($player))
    //             ->response()
    //             ->setStatusCode(201);
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
