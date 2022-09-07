@extends('layouts.prod')


@section('title', '商品画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>User Form</h1>
            <form action="{{ route('submit') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="user_name">ユーザ名</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="user_name" value="{{ old('user_name') }}">
                    @if($errors->has('user_name'))
                        <p>{{ $errors->first('user_name') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Eメール</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <p>{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="representative_name">代表責任者</label>
                    <input type="representative_name" class="form-control" id="representative_name" name="representative_name" placeholder="representative_name" value="{{ old('representative_name') }}">
                    @if($errors->has('representative_name'))
                        <p>{{ $errors->first('representative_name') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-default">送信</button>
            </form>
        </div>
    </div>
@endsection