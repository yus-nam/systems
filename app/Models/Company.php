<?php
//Article & List -> Company、Regist -> Compreg、app -> cmp、submit->pany
namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    // use HasFactory;
    public function getCompany() {
        // companiesテーブルからデータを取得
        $companies = DB::table('companies')->get();

        return $companies;
    }

    public function compregCompany($data) {
        // 登録処理
        DB::table('companies')->insert([
            'company_name' => $data->company_name,
            'street_address' => $data->street_address,
            'representative_name' => $data->representative_name,
        ]);
    }
}
