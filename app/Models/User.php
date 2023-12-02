<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
use App\Enums\UserStatusEnum;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes; // add soft delete

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info() {
        return $this->hasOne(UserInfo::class);
    }

    // get active user
//    public function scopeActive($query) {
//        return $query->where('status', '1');
//    }
    public function scopeActive($query) {
        return $query->where('status', UserStatusEnum::ACTIVE->value);
    }

    // get inactive user
//    public function scopeInactive($query) {
//        return $query->where('status', '0');
//    }
    public function scopeInactive($query) {
        return $query->where('status', UserStatusEnum::INACTIVE->value);
    }

    public function getStatusAttribute($attribute) {
        return [
            0 => 'Inactive',
            1 => 'Active',
        ][$attribute];
    }

}
