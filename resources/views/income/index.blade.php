@extends('layouts.app')

@section('content')
    <div class="container">
       <h4>Quản lý Khoản Thu </h4>
        <p>
                        <a class="btn btn-success" href="{{route('income.create')}}">Add New Income</a>
{{--            <a class="btn btn-success" href="">Add New Income</a>--}}
        </p>

        <div class="flash-message">

            @foreach(['danger', 'success', 'warning', 'info'] as $type)
                @if(\Illuminate\Support\Facades\Session::has($type))
                    <p class="alert alert-{{$type}}">
                        {{\Illuminate\Support\Facades\Session::get($type)}}
                    </p>
                @endif
            @endforeach


        </div>

        <table class="table">
            <tr>
                <th>Thời gian</th>
                <th>Loại khoản thu</th>
                <th>Số tiền</th>
                <th>Lựa chọn loại khoản thu</th>
                <th>Ghi chú</th>


            </tr>

                        @foreach($lsincome as $income)
                            <tr>
                                <td>{{$income->dateTime}}</td>
{{--                                <td>{{$income->income}}</td>--}}
                                <td>{{$income->categoryExpenseld}}</td>
                                <td>{{$income->amount}}</td>
                                <td>{{$income->note}}</td>
                                <td>
{{--                                    <a class="btn btn-dark" href='{{route("category.edit", $income->id)}}'>Edit</a> |--}}
{{--                                    <form method="post" action="{{route('category.destroy', $income->id)}}" onsubmit='return confirm("sure ?")'>--}}
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
        </table>
    </div>


    <script type="text/javascript">
        function confirmDelete(){
            var value = confirm("sure ? ");
            return value;
        }

    </script>
@endsection
