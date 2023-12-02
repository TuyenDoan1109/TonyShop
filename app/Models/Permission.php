<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'role_permission', 'permission_id', 'role_id');
    }

    public function admins() {
        return $this->belongsToMany('App\Models\Admin', 'admin_permission', 'permission_id', 'admin_id');
    }
}
