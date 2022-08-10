@extends('layouts.prod')


@section('title', '商品編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Product Edit Form</h1>
            <form action="{{ route('submit') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="company_id">企業ID</label>
                    <input type="text" class="form-control" id="company_id" name="company_id" placeholder="company_id" value="{{ old('company_id') }}">
                    @if($errors->has('company_id'))
                        <p>{{ $errors->first('company_id') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="img_path">商品画像</label>
                    
                    <img src="{{ asset('/vegan') }}" class="card-img"/>

                    @if($errors->has('img_path'))
                        <p>{{ $errors->first('img_path') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="product_name">商品名</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="product_name" value="{{ old('product_name') }}">
                    @if($errors->has('product_name'))
                        <p>{{ $errors->first('product_name') }}</p>
                    @endif
                </div>

                <label for="maker">メーカー</label>
                <select name="maker" id="maker" placeholder="maker">
                    <option value="maker_name">メーカー名</option>
                    <option value="the-kirishima">Kirishima</option>
                    <option value="kenon">KenOn</option>
                    <option value="toho-ent">TOHO ENT.</option> 
                </select>

                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="price" value="{{ old('price') }}">
                    @if($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="stock">在庫数</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="stock" value="{{ old('stock') }}">
                    @if($errors->has('stock'))
                        <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea class="form-control" id="comment" name="comment" placeholder="comment">{{ old('comment') }}</textarea>
                    @if($errors->has('comment'))
                        <p>{{ $errors->first('comment') }}</p>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-default" url="#"><a href="#">更新</a></button>

                <button type="submit" class="btn btn-default" url="#"><a href="detail">戻る</a></button>
            </form>
        </div>
    </div>
@endsection