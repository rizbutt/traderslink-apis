<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class AppUserController extends Controller
{
    public function regitser(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($data->fails()) {
            $errors = $data->errors();
            return response()->json(['message' => $errors]);
        }

        $data = $data->safe()->collect();
        User::create([
                        'name' => $data['name'],
                        'phone' => $data['phone'],
                        'password' => Hash::make($data['password']),
                        'type' => 2,
                        'status' => 1,
        ]);
        return response()->json([['message' => 'Success']]);
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
                'data' => $errors,
            ]);
        }
        
        $data = $data->safe()->collect();
        if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
            //$session = $request->session()->regenerate();
            $token = auth()->user()->createToken('API Token')->accessToken;
            return response()->json(['user' => auth()->user(), 'token' => $token]);
            //return redirect()->intended('dashboard');
        }else{
            return response()->json(['user' => 'Wrong Phone/Password']);
        }
    }
}
