<?php

namespace App\Models;

//Article->Product

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    // use HasFactory;
    public function getList() {
        // productsテーブルからデータを取得
        $products = DB::table('products')->get();

        return $products;
    }

    public function searchProduct($data) {
        // 検索処理
        $search = $_POST[“search”];

        if (isset($_POST["search"])) {
            //検索ボタン押下時の処理を記述
            //PDOを使ってMySQLに接続
            $pdo = new PDO(◯◯◯◯,◯◯◯◯,◯◯◯◯, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            //SQLを作成
            $sql = "SELECT * FROM [テーブル名] WHERE [カラム名] = ?";

            //executeで実行
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($search));
        }
    }


    public function registProduct($data) {
        // 登録処理
        DB::table('products')->insert([
            'company_id' => $data->company_id,
            // 'img_path' => $data->img_path,
            'product_name' => $data->product_name,
            'maker' => $data->maker,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
        ]);
    }


    public function renewProduct($data) {
        // 登録処理
        DB::table('products')->insert([
            'company_id' => $data->company_id,
            // 'img_path' => $data->img_path,
            'product_name' => $data->product_name,
            'maker' => $data->maker,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
        ]);
    }


    public function deleteProductById($id) {
        // 削除処理
        DB::table('products')->delete();
    }

}




