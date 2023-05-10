<?php
//Article&List->User、Regist->Usreg、app->usr、submit->usrsub
namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    // use HasFactory;
    public function getUser() {
        // usersテーブルからデータを取得
        $users = DB::table('users')->get();

        return $users;
    }

    public function usregUser($data) {
        // 登録処理
        DB::table('users')->insert([
            'user_name' => $data->user_name,
            'email' => $data->email,
            'password' => $data->password,
        ]);
    }


    
}
