<?php

use App\Models\User;
use App\Rules\Phone;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::post('/session', function () {
    return response(session()->all());
});

Route::get('/me', function(Request $request) {
    return response($request['user']);
});

Route::post('/login', function (Request $request) {
    if($request["user"]) return response(["success" => false, "data" => "You are already logged in"], 400);

    $validate = Validator::make($request->all(), [
        'email' => ['required'],
        'password' => ['required']
    ]);

    if($validate->fails()) {
        return response([
            "success" => false,
            "data" => "make sure to provide your phone number and password"
        ], 400);
    }

    $u = User::where("email", $request->post('email', ''))->first();
    if(!$u) return response([
        "success" => false,
        "data" => "i cannot find the user"
    ], 404);

    if(!Hash::check($request->post('password', ''), $u->password)) return response([
        "success" => false,
        "data" => "the password you entered incorrect"
    ], 400);

    $jwt = JWT::encode([
        "iss" => env("APP_NAME"),
        "type" => "auth",
        "payload" => $u->id
    ], env("JWT_SECRET"), env("JWT_ALG"));
    session()->put(env('JWT_KEY'), $jwt);

    return response([
        "success" => true,
        "data" => [
            "user" => $u,
            "token" => $jwt
        ]
    ]);
});

Route::post('/register', function (Request $request) {
    if($request["user"]) return response(["success" => false], 400);

    $validate = Validator::make($request->all(), [
        'name' => ['required', 'max:50'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'password_confirmation' => ['required'],
        'phone' => ['required', new Phone]
    ]);

    if($validate->fails()) {
        return response([
            "success" => false,
            "data" => $validate->errors()
        ], 400);
    }

    $u = User::where('email', $request->post('email', ''))->orWhere("phone", $request->post('phone',''))->first();
    if($u) {
        return response([
            "success" => false,
            "data" => "this email/phone already exists!"
        ], 400);
    }

    $user = new User();
    $user->name = $request->post('name');
    $user->phone = $request->post('phone');
    $user->password = Hash::make($request->post('password'));
    $user->email = $request->post('email');
    $save = $user->save();
    if(!$save) {
        return response([
            "success" => false,
            "data" => "Error while registering you.."
        ], 500);
    }

    $user = $user->refresh();
    $jwt = JWT::encode([
        "iss" => env("APP_NAME"),
        "type" => "auth",
        "payload" => $user->id
    ], env("JWT_SECRET"), env("JWT_ALG"));
    session()->put(env('JWT_KEY'), $jwt);

    return response([
        "success" => true,
        "data" => [
            "user" => $user,
            "token" => $jwt
        ]
    ], 201);
});