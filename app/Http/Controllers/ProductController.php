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

    //登録画面表示
    public function showRegistForm() {
        return view('product/regist');
    }

    //登録処理
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

        // $registProduct = $this->product->InsertProduct($request);
        // return redirect()->route('/product/list');
    }

    public function SearchList(Request $request) {

        // dd($request->all());
        // 商品一覧をページネートで取得
        //ページネートが10の場合、10件で1ページ
        $products = Product::paginate(10);

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Product::query();

        // もし検索フォームにキーワードが入力されたら
        if ($search) {

            // 全角英数字およびスペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 'as');

            // 単語を半角スペースで区切り、配列にする（例："Nar TOHO ENT." → ["Nar", "TOHO ENT."]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、商品名と部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->orwhere('product_name', 'LIKE', '%'.$value.'%');
                $query->orwhere('company_id','LIKE', '%'.$value.'%');
            }
            // dd($wordArraySearched);

            // 上記で取得した$queryをページネートにし、変数$productsに代入
                $products = $query->paginate(20);
        }

        // ビューにproductsとsearchを変数として渡す
            return view('product/list')->with([
                'products' => $products,
                'search' => $search,
            ]);

            // return $query->get();

            // dd($search);
    }

    

    public function showDetailForm() {
        return view('product/detail');
    }

    public function showEditForm() {

        // $data = Product::findOrFail($id);

        return view('product/edit');
    }
    
        /**
     * 削除処理
     * @param int $id
     * @return view
     */
    public function deleteProductById($id) {

        $product = Product::destroy($id);
        // $product = $this->product->deleteProductById();

        if (empty($product)) {
            // \Session::flash('err_msg', 'データが存在しません。');
        
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('list');
        }
        try {
            // 削除処理呼び出し
            Product::destroy($id);
            
        } catch (\Exception $e) {
            abort(500);
        }
            // \Session::flash('err_msg', 'データ削除が完了しました。');
            
            return redirect()->route('list');

    }

    
    

}
