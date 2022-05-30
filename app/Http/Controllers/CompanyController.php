<?php
//Article&List->Company、Regist->Compreg、app->cmp、submit->pany
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //
    public function showCompany() {
        // インスタンス生成
        $model = new Company();
        $companies = $model->getCompany();

        return view('company', ['companies' => $companies]);
    }

    public function showCompregForm() {
        return view('compreg');
    }

    public function compregPany(CompanyRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new Company();
            $model->compregCompany($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらcompregにリダイレクト
        return redirect(route('compreg'));
    }






}
