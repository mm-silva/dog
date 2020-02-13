<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ApiController extends Controller
{
protected function create(array $data){
    return User::forceCreate([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'api_token' => Str::random(80),
    ]);
}

public function update(Request $request)
{
    $token = Str::random(80);

    $request->user()->forceFill([
        'api_token' => hash('sha256', $token),
    ])->save();

    return ['token' => $token];
}

}
