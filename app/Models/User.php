<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasFactory, Notifiable, HasApiTokens;

  protected $fillable = [
    'login',
    'email',
    'surname',
    'name',
    'patronymic',
    'sex',
    'birthday',
    'password',
    'role_id',
  ];
  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected function casts(): array
  {
    return ['password' => 'hashed'];
  }

  public function role()
  {
    return $this->belongsTo(Role::class);
  }
}
