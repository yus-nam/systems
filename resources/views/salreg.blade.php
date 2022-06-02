@extends('layouts.sell')


@section('title', '売上管理画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Sale Form</h1>
            <form action="{{ route('submit') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="product_id">商品ID</label>
                    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="product_id" value="{{ old('product_id') }}">
                    @if($errors->has('product_id'))
                        <p>{{ $errors->first('product_id') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-default">送信</button>
            </form>
        </div>
    </div>
@endsection