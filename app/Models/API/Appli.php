<?php

namespace App\Models;

//Article->Appli

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appli extends Model
{
    // use HasFactory;
    public function getAppli() {
        // Applisテーブルからデータを取得
        $applis = DB::table('applis')->get();

        return $applis;
    }

    public function appregAppli($data) {
        // 登録処理
        DB::table('applis')->insert([
            
            
        ]);
    }

}
