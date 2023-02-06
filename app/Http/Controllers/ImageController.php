<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'public';

        // アップロードされたファイル名を取得
        $file_name = $request->file('img_path')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('img_ぱth')->storeAs('public' . $dir, $file_name);

        // publicディレクトリに画像を保存
        // $request->file('img_path')->store('public/' . $dir);

        // ファイル情報をDBに保存
        $img_path = new Image();
        $img_path->name = $file_name;
        $img_path->path = 'storage/' . $dir . '/' . $file_name;
        $img_path->save();

        return redirect('/');

        return redirect('/');
    }
}
