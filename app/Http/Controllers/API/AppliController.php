<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppliController extends Controller
{
    //User->Appli
    public function showAppli() {
        // インスタンス生成
        $model = new Applis();
        $applis = $model->getAppli();

        return view('appli', ['applis' => $applis]);
    }

    public function showAppregForm() {
        return view('appreg');
    }

    public function AppregAplsub(AppliRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new Appli();
            $model->appregAppli($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらusregにリダイレクト
        return redirect(route('appreg'));
    }


}
