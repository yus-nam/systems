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

    protected $table = 'products';

    protected $primaryKey = 'company_id';
    
    // protected $fillable = [
    //     'company_id',
    //     'img_path',
    //     'produt_name',
    //     'maker',
    //     'price',
    //     'stock',
    //     'comment',
    //     'created?at',
    //     'updated_at'
    // ];

    /**
     * 一覧画面表示用にproductテーブルから全てのデータを取得
     */
    public function findAllProduct()
    {
        return Product::all();
    }

    public function searchList($search) {
        // //検索処理
        DB::table('products')->insert([
            'company_id' => $search->company_id,
            // 'img_path' => $data->img_path,
            'product_name' => $search->product_name,
            'maker' => $search->maker,
            'price' => $search->price,
            'stock' => $search->stock,
            'comment' => $search->comment,
        ]);
        dd($search);
    }

    public function CreateProduct($data) {
    //     // 追加処理(新規登録)
        DB::table('products')->where()->insert([
            'img_path' => $data->img_path,
            'product_name' => $data->product_name,
            'maker' => $data->maker,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
        ]);
        // dd($data);
    }

    public function StoreProduct($data) {
        // 追加処理(新規登録)
        DB::table('products')->where()->insert([
            'img_path' => $data->img_path,
            'product_name' => $data->product_name,
            'maker' => $data->maker,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
        ]);
        // dd($data);
    }

    public function updateProduct($data) {
        // 更新処理ptn2
        DB::table('products')->where()->Insert([
            'company_id' => $data->company_id,
            'img_path' => $data->img_path,
            'product_name' => $data->product_name,
            'maker' => $data->maker,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
        ]);

        
        // dd($data);
    }
    

    public function deleteProductById($id) {
        // // 削除処理
        // DB::table('products')->delete();

        // // productsテーブルから指定のIDのレコード1件を取得
        // $products = Product::find($id);
        // // レコードを削除
        
        // $products->delete();

        // // 削除したら一覧画面にリダイレクト
        // return $this->destroy($id);
        
        //ddデバッグ
        // dd($id);

        $products = Product::where('company_id')
        ->orderBy('company_id', 'desc')
        ->get();

    }

}




