<?php

namespace App\Http\Controllers;

use App\Models\user;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\userregister;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class JWTController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required|string',
            'last_name'   => 'required|string',
            'email'       => 'required|string|email|unique:users',
            'password'    => 'required|string|min:6',

        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()]);
        } else {
            $user = User::insert([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'role_id'    => 5,
                'password'   => Hash::make($request->password),
            ]);
            Mail::to($request->email)->send(new userregister($request->all()));
            return response()->json([
                'message' => 'User create successfully',
                'user' => $user
            ]);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            if (!$token = auth()->guard('api')->attempt($validator->validated())) {
                return response()->json(['error' => 'Email or password not match']);
            }
            // return $this->respondWithToken($token);
            return response()->json(['access_token' => $token, 'email' => $request->email, "message" => "user login successfully!"]);
        }
    }
    public function logout()
    {
        auth()->guard('api')->logout();
        return response()->json(["message" => "User Logout Successfully"]);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        ]);
    }
    public function userProfile()
    {
        return response()->json(auth()->user());
    }
    //change password
    public function changepassword(Request $req)
    {
        $input = $req->all();
        $userid = Auth::guard('api')->user()->id;
        $val = $req->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        if ($val) {

            if ((Hash::check(request('oldpassword'), Auth::user()->password)) == false) {
                return response()->json(['message' => 'Check your old password']);
            } else if ((Hash::check(request('password'), Auth::user()->password)) == true) {
                return response()->json(['message' => 'Please enter a password which is not similar then current password']);
            } else {
                User::where('id', $userid)->update(['password' => Hash::make($input['password'])]);
                return response()->json(['message' => 'Password updated successfully']);
            }
        }
    }
    public function changeprofile(Request $req)
    {
        $input = $req->all();
        $userid = Auth::guard('api')->user()->id;
       $val=$req->validate([
        'first_name'=>'required',
        'email'=>'required',
        'last_name'=>'required'
      ]);
      if($val)
      {
        User::where('id', $userid)->update([
            'first_name'=>$req->first_name,
            'last_name'=>$req->last_name,
            'email'=>$req->email,
        ]);
        return response()->json(['message'=>'profile updated successfully']);
      }
    }
}
