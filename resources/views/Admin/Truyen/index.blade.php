@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liệt kê truyện</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped" class="form-control">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên truyện</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tóm tắt</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Nổi bật</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_truyen as $key => $truyen)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $truyen->tentruyen }}</td>
                                        <td><img src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" height="100px"
                                                width="100px"></td>
                                        <td>{{ $truyen->tomtat }}</td>
                                        <td>{{ $truyen->danhmuctruyen->tendanhmuc }}</td>
                                        <td>{{ $truyen->theloai->tentheloai }}</td>
                                        <td style="width: 15%">
                                            @if ($truyen->truyen_noibat == 0)
                                            <form action="">
                                                @csrf
                                                <select name="noibat" data-truyen_id="{{$truyen->id}}" class="custom-select truyennoibat">
                                                    <option selected value="0">Truyện mới</option>
                                                    <option value="1">Truyện nổi bật</option>
                                                    <option value="2">Truyện xem nhiều</option>

                                                </select>
                                            </form>

                                            @elseif ($truyen->truyen_noibat == 1)
                                            <form action="">
                                                @csrf
                                            <select name="noibat" data-truyen_id="{{$truyen->id}}" class="custom-select truyennoibat">
                                                <option  value="0">Truyện mới</option>
                                                <option selected value="1">Truyện nổi bật</option>
                                                <option value="2">Truyện xem nhiều</option>

                                            </select>
                                            </form>
                                            @else
                                            <form action="">
                                                @csrf
                                            <select name="noibat" data-truyen_id="{{$truyen->id}}" class="custom-select truyennoibat">
                                                <option  value="0">Truyện mới</option>
                                                <option value="1">Truyện nổi bật</option>
                                                <option selected value="2">Truyện xem nhiều</option>

                                            </select>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($truyen->trangthai == 0)
                                                <span class="text text-succses">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('truyen.edit', [$truyen->id]) }}"
                                                class="btn btn-primary">Sửa</a>
                                            <form action="{{ route('truyen.destroy', [$truyen->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn có chắc muốn xoá!!')"
                                                    class="btn btn-danger">Xoá</button>

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
