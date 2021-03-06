<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
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

    public function showDetailForm() {
        return view('product/detail');
    }

    public function showEditForm() {
        return view('product/edit');
    }

    // public function deleteProduct() {
    //     $model->delete($request);

    //     //削除が完了したらlistにリダイレクト
    //     return redirect('product/list');
    // }
    
}
