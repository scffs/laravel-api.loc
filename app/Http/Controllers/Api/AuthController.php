<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  /*
   * Регистрация
   */
  public function signup(RegisterRequest $request): Application|Response|ResponseFactory
  {
    $roleId = Role::firstOrCreate(['code' => 'user'])->id;

    $user = User::create([
      ...$request->validated(),
      'role_id' => $roleId
    ]);

    $token = $user->api_token = Hash::make(Str::random(60));
    $user->save();

    return response([
      'token' => $token,
      'data' => UserResource::make($user),
    ], 201);
  }


  /*
   * Авторизация
   */
  public function login(Request $request): Application|Response|ResponseFactory
  {
    if (!Auth::attempt($request->only('login', 'password')))
      throw new ApiException(401, 'Invalid credentials');

    $user = Auth::user();
    $token = $user->api_token = Hash::make(Str::random(60));
    $user->save();

    return response([
      'token' => $token,
      'data' => UserResource::make($user),
    ], 200);
  }


  /*
   * Выход
   */
  public function logout(Request $request): Application|Response|ResponseFactory
  {
//    $request->user()->currentAccessToken()->delete();
    return response(null, 204);
  }
}
