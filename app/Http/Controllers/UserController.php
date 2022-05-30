<?php
//Article&List->User、Regist->Usreg、app->usr、submit->usrsub
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function showUser() {
        // インスタンス生成
        $model = new Users();
        $users = $model->getUser();

        return view('user', ['users' => $users]);
    }

    public function showUsregForm() {
        return view('usreg');
    }

    public function usregUsrsub(UserRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new User();
            $model->usregUser($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらusregにリダイレクト
        return redirect(route('usreg'));
    }
}
