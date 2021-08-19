@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm truyện</div>
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


                        <form method="POST" action="{{ route('truyen.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <input type="text" name="tentruyen" value="{{ old('tentruyen') }}"
                                    onkeyup="ChangeToSlug()" class="form-control" id="slug" placeholder="Nhập truyện.."
                                    aria-describedby="emailHelp" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tác giả</label>
                                <input type="text" name="tacgia" value="{{ old('tacgia') }}"
                                    onkeyup="ChangeToSlug()" class="form-control" id="slug" placeholder="Nhập tác giả.."
                                    aria-describedby="emailHelp" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                                    id="convert_slug" placeholder="Nhập slug.." aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label><br>
                                <textarea class="form-control" name="tomtat" placeholder="Tóm tắt truyện.." rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file"  name="hinhanh" class="form-control-file" id=""
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục</label>
                                <select name="danhmuc" class="custom-select">
                                    @foreach ($danhmuc as $key => $muc)
                                        <option value="{{ $muc->id }}">{{ $muc->tendanhmuc }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại</label>
                                <select name="theloai" class="custom-select">
                                    @foreach ($theloai as $key => $tl)
                                        <option value="{{ $tl->id }}">{{ $tl->tentheloai }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Truyện nổi bật</label>
                                <select name="noibat" class="custom-select">
                                    <option value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="trangthai" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
