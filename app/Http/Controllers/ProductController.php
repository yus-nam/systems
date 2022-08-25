<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showList() {
        // インスタンス生成
        $model = new Product();
        $products = $model->getList();

        return view('../product/list', ['products' => $products]);
    }

    public function showRegistForm() {
        return view('product/regist');
    }

    public function registSubmit(ProductRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new Product();
            $model->registProduct($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('product/regist'));
    }

    public function searchList() {
        #キーワード受け取り
        $keyword = $request->input('keyword');

        #クエリ生成
        $query = User::query();

        #もしキーワードがあったら
        if(!empty($keyword))
        {
        $query->where('name','like','%'.$keyword.'%')->orWhere('mail','like','%'.$keyword.'%');
        }

        #ページネーション
        $data = $query->orderBy('created_at','desc')->paginate(10);
            return view('product.list')->with('data',$data)->with('keyword',$keyword)->with('message','userList');
    }


    public function showDetailForm() {
        return view('product/detail');
    }

    public function showEditForm() {
        return view('product/edit');
    }
    
        /**
     * 削除処理
     */
    public function destroy($id)
    {
        // productsテーブルから指定のIDのレコード1件を取得
        $products = Product::find($id);
        // レコードを削除
        $products->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('list');
    }
    

}
