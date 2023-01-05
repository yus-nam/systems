<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller {

    public function store(Request $request)
    {
        $picture=new picture();
        //投稿した画像とコメントをDBに格納させる
        $picture->user_name=$request->user_name;
        $picture->content=$request->content;
        $filename=$request->file('thefile')->store('public');       //storageフォルダに投稿した画像を保存しファイルパスを格納
        $picture->image=str_replace('public/','',$filename);        //ファイル名から「public/」を取り除く
        $picture->save();
         //tinkerコマンドと同じ
        return redirect()->route('picture.show',['id'=>$picture->id]);
    }

    public function show(Request $request,$id,Picture $picture)
    {
        $message='This is your picture.'.$id;
        $picture=Picture::find($id);
        Storage::disk('local')->exists('public/storage/'.$picture->image);
         //$idに格納された番号と一致したデータを引っ張り出す。
        return view('show',['message'=>$message,'picture'=>$picture]);
    }
}