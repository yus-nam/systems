@extends('layouts.prod')


@section('title', '商品詳細&編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="page_name">商品詳細&編集画面</h1>
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
                    
                    <!-- <img src="{{ asset('Vending') }}" class="card-img" name="img_path"/>
                    <input type="file" class="img_path" name="img_path" id="img_path"> -->

                    @if($errors->has('img_path'))
                        <p>{{ $errors->first('img_path') }}</p>
                    @endif

                    <form action="{{ route('list') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="img_path">
                        <!-- <input type="submit" value="アップロード"> -->
                    </form>
                </div>


                <div class="form-group">
                    <label for="product_name">商品名</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="product_name" value="{{ old('product_name') }}">
                    @if($errors->has('product_name'))
                        <p>{{ $errors->first('product_name') }}</p>
                    @endif
                </div>

                <div class="form-group">
                <label for="maker" class="maker_name">メーカー</label>
                    <select name="maker" id="maker" placeholder="maker">
                        <option value="">メーカー名</option>
                        <option value="acala">Acala</option>
                        <option value="tears">Tears</option>
                        <option value="yuuhi">YUUHI</option> 
                        <option value="shiou">Shiou</option>
                    </select>
                </div>

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
                
                <button type="submit" class="btn btn-default" url="edit"><a href="list">更新</a></button>

                <button type="submit" class="btn btn-default" url="list"><a href="list">戻る</a></button>
            </form>
        </div>
    </div>
@endsection