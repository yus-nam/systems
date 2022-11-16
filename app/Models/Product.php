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

    public function registProduct($data) {
        // 登録処理
        DB::table('products')->insert([
            'company_id' => $data->company_id,
            'img_path' => $data->img_path,
            'product_name' => $data->product_name,
            'maker' => $data->maker,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
        ]);
    }

    protected $table = 'product';

    protected $primaryKey = 'company_id';
    
    protected $fillable = [
        'company_id',
        'img_path',
        'produt_name',
        'maker',
        'price',
        'stock',
        'comment',
        'created?at',
        'updated_at'
    ];
/**
     * 一覧画面表示用にproductテーブルから全てのデータを取得
     */
    public function findAllProduct()
    {
        return Product::all();
    }

    public function InsertProduct($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'product_name' => $request->product_name,
        ]);
    }







    public function searchList($data) {
        // //検索処理
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
        // 更新処理
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

        // productsテーブルから指定のIDのレコード1件を取得
        $products = Product::find($id);
        // レコードを削除
        
        $products->delete();

        // 削除したら一覧画面にリダイレクト
        return $this->destroy($id);
        
        //ddデバッグ
        // dd($id);

    }

}




