@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê danh mục</div>

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
                                    <th scope="col">Tên DM</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($danhmuctruyen as $key => $dm)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $dm->tendanhmuc }}</td>
                                        <td>{{ $dm->mota }}</td>
                                        <td>
                                            @if ($dm->trangthai == 0)
                                                <span class="text text-succses">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('danhmuc.edit',[$dm->id])}}" class="btn btn-primary">Sửa</a>
                                            <form action="{{route('danhmuc.destroy',[$dm->id])}}" method="POST">
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
