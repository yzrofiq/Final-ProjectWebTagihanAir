<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usermodel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_users'; // Define the table name if it does not follow Laravel's naming convention

    protected $primaryKey = 'id_user'; // Specify the primary key for the table

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_user',
        'username',
        'password',
        'level',
        'no_hp',
        'no_rek',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // The setPasswordAttribute method is removed to prevent automatic password hashing
}
