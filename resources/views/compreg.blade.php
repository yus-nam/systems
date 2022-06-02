@extends('layouts.prod')


@section('title', '商品画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Company Form</h1>
            <form action="{{ route('submit') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="company_name">企業名</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="company_name" value="{{ old('company_name') }}">
                    @if($errors->has('company_name'))
                        <p>{{ $errors->first('company_name') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="street_address">所在地</label>
                    <input type="text" class="form-control" id="street_address" name="street_address" placeholder="street_address" value="{{ old('street_address') }}">
                    @if($errors->has('street_address'))
                        <p>{{ $errors->first('street_address') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="representative_name">代表責任者</label>
                    <input type="text" class="form-control" id="representative_name" name="representative_name" placeholder="representative_name" value="{{ old('representative_name') }}">
                    @if($errors->has('representative_name'))
                        <p>{{ $errors->first('representative_name') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-default">送信</button>
            </form>
        </div>
    </div>
@endsection