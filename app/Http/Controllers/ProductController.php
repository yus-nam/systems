<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Tag;

class ProductController extends Controller
{
    public function showList() {
        // インスタンス生成
        $model = new Product();

        // $products = Product::latest()->paginate(8);

        $products = $model->getList();

        return view('../product/list', ['products' => $products]);
    }

    public function searchList(Request $request) {
        // dd('aaa');
        // dd($request->all());
        // 商品一覧をページネートで取得
        //ページネートが10の場合、10件で1ページ
        $products = Product::paginate(10);

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Product::query();

        // もし検索フォームにキーワードが入力されたら
        // dd($search);
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
                // dd($products);
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
    //     $product = Product::find($request->company_id);
        return view('product/detail');

        // dd($company_id);
    }



    public function showEditForm() {

        // $data = Product::findOrFail();

        return view('product/edit');

        // dd($data);

    }

    //登録画面表示
    public function showRegistForm() {
        return view('product/regist');
    }

    // 登録処理
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

    //追加処理
    // public function CreateProduct(Request $request) {
    public function CreateProduct(Request $request, $data) {
        {  
            User::create([
                "company_id" => $request->company_id,
                "product_name" => $request->product_name,
                "img_path" => $request->img_path,
                "maker" => $request->maker,
                "price" => $request->price,
                "stock" => $request->stock,
                "comment" => $request->comment,
            ]);

            return redirect("product/list");  
        }
    }

    //画像登録処理
    public function StoreProduct(Request $request, $data) {
        {   
            $data = $request->all();
            // dd($data);
            $image = $request->file('img_path');
            // dd($image);
            // 画像がアップロードされていれば、storageに保存
            if($request->hasFile('img_path')) {
                $path = \Storage::put('/public/Vending', $img_path);
                $path = explode('/', $path);
            } else {
                $path = null;
            }
        }
        dd($path);
    }

    /**
     * 削除処理
     * @param int $id
     * @return view
     */
    public function deleteProductById($id) {
        // dd($id);

        $product = Product::where('id', $id)->delete();
        // $product = $this->product->deleteProductById();

        // if (empty($product)) {
        //     // \Session::flash('err_msg', 'データが存在しません。');
        
        // // 削除したら一覧画面にリダイレクト
        // return redirect()->route('list');
        // }
        // try {
        //     // 削除処理呼び出し
        //     Product::destroy($id);
            
        // } catch (\Exception $e) {
        //     abort(500);
        // }
            // \Session::flash('err_msg', 'データ削除が完了しました。');
            
            return redirect()->route('list');

    }

    
    

}
