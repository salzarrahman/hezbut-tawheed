<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    public $guard_name = 'api';

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getPermissionGroup(){
        $permissions_group = DB::table('permissions')
        ->select('group_name')
        ->groupBy('group_name')->get();

        return $permissions_group;
    }

    public static function getPermissionByGroup($group_name){
        $permissions = DB::table('permissions')
        ->select('name','id')
        ->where('group_name', $group_name)->get();

        return $permissions;
    }

    public static function roleHasPermissions($role, $permission){
      

    }




}
