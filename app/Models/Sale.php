<?php
//Article & List -> Sale、Regist -> Salreg、app -> sell
namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    // use HasFactory;
    public function getSale() {
        // salesテーブルからデータを取得
        $sales = DB::table('sales')->get();

        return $sales;
    }

    public function salregProduct($data) {
        // 登録処理
        DB::table('sales')->insert([
            'product_id' => $data->product_id,
        ]);
    }
}
