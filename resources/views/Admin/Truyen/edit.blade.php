@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa truyện</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ route('truyen.update', [$truyen->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <input type="text" name="tentruyen" value="{{ $truyen->tentruyen }}"
                                    onkeyup="ChangeToSlug()" class="form-control" id="slug" aria-describedby="emailHelp"
                                    id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tác giả</label>
                                <input type="text" name="tacgia" value="{{ $truyen->tacgia }}" onkeyup="ChangeToSlug()"
                                    class="form-control" id="slug" placeholder="Nhập tác giả.." aria-describedby="emailHelp"
                                    id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" name="slug" value="{{ $truyen->slug }}" class="form-control"
                                    id="convert_slug" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label><br>
                                <textarea class="form-control" name="tomtat" rows="5"
                                    style="resize: none">{{ $truyen->tomtat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" name="hinhanh" class="form-control-file" id=""
                                    aria-describedby="emailHelp">
                                <img src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" height="100px"
                                    width="100px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục</label>
                                <select name="danhmuc" class="custom-select">
                                    @foreach ($danhmuc as $key => $muc)
                                        <option {{ $muc->id == $truyen->danhmuc_id ? 'selected' : '' }}
                                            value="{{ $muc->id }}">{{ $muc->tendanhmuc }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại</label>
                                <select name="theloai" class="custom-select">
                                    @foreach ($theloai as $key => $tl)
                                        <option {{ $tl->id == $truyen->id ? 'selected' : '' }}
                                            value="{{ $tl->id }}">{{ $tl->tentheloai }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">

                                <label for="exampleInputEmail1">Truyện nổi bật</label>
                                <select name="noibat" class="custom-select">

                                    @if ($truyen->truyen_noibat == 0)

                                        <option selected value="0">Truyện mới</option>
                                        <option value="1">Truyện nổi bật</option>
                                        <option value="2">Truyện xem nhiều</option>

                                    @elseif ($truyen->truyen_noibat==1)

                                        <option value="0">Truyện mới</option>
                                        <option selected value="1">Truyện nổi bật</option>
                                        <option value="2">Truyện xem nhiều</option>

                                    @else
                                        <option value="0">Truyện mới</option>
                                        <option value="1">Truyện nổi bật</option>
                                        <option selected value="2">Truyện xem nhiều</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="trangthai" class="custom-select">
                                    @if ($truyen->trangthai == 0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif

                                </select>
                            </div>
                            <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
