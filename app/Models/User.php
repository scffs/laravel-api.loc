<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    'api_token',
  ];
  protected $hidden = [
    'password',
    'api_token'
  ];

  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class);
  }

  protected function casts(): array
  {
    return [
      'password' => 'hashed',
      'birthday' => 'date'
    ];
  }
}
