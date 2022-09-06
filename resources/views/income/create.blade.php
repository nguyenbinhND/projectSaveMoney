@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($errors) >0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            </div>
        @endif
        <form method="post" action="{{route('income.store')}}">
            @csrf
            <div class="form-group">
                <label>Thời gian</label>
                <input class="form-control" type="date" name="dateTime" value="{{old('dateTime')}}"/>
            </div>
{{--            <div class="form-group">--}}
{{--                <label>Loại khoản thu</label>--}}
{{--                <input class="form-control" type="text" name="categoryExpenseld" value="{{old('categoryExpenseld')}}"/>--}}
{{--            </div>--}}
            <div class="form-group">
                <label>Lựa chọn thành phần loại khoản thu</label>
                <input class="form-control" type="text" name="categoryExpenseld" value="{{old('categoryExpenseld')}}"/>
            </div>
            <div class="form-group">
                <label>Số tiền</label>
                <input class="form-control" type="text" name="amount" value="{{old('amount')}}"/>
            </div>
            <div class="form-group">
                <label>Ghi Chú</label>
                <textarea class="form-control" name="note"> </textarea>
            </div>
            <div>
                <input type="submit" class="btn btn-primary " value="Save">
            </div>

        </form>
    </div>
@endsection
