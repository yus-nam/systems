<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'locked_flg',
        'error_count',
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
}

//Article&List->User、Regist->Usreg、app->usr、submit->usrsub
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

// class User extends Authenticatable
// {
//     // use HasFactory;
//     public function getUser() {
//         // usersテーブルからデータを取得
//         $users = DB::table('users')->get();

//         return $users;
//     }

//     public function usregUser($data) {
//         // 登録処理
//         DB::table('users')->insert([
//             'user_name' => $data->user_name,
//             'email' => $data->email,
//             'password' => $data->password,
//         ]);
//     }   
// }
