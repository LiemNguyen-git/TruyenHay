@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê chapter</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên </th>
                                    <th scope="col">Tóm tắt</th>
                                    <th scope="col">Thuộc truyện</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chapter as $key => $chap)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $chap->tieude }}</td>
                                        <td>{{ $chap->tomtat }}</td>
                                        <td>{{ $chap->truyen->tentruyen }}</td>
                                        <td>
                                            @if ($chap->trangthai == 0)
                                                <span class="text text-succses">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('chapter.edit',[$chap->id])}}" class="btn btn-primary">Sửa</a>
                                            <form action="{{route('chapter.destroy',[$chap->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn có chắc muốn xoá!!')" class="btn btn-danger">Xoá</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
