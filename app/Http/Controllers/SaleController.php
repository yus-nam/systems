<?php
//Article&List->Sale、Regist->Salreg、app->sell、submit->selling
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //
    public function showSale() {
        // インスタンス生成
        $model = new Sale();
        $sales = $model->getSale();

        return view('sale', ['sales' => $sales]);
    }

    public function showSalregForm() {
        return view('salreg');
    }

    public function salregSelling(SaleRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new Sale();
            $model->salregSale($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらsalregにリダイレクト
        return redirect(route('salreg'));
    }
}
