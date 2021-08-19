@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm chapter</div>
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


                        <form method="POST" action="{{ route('chapter.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chapter</label>
                                <input type="text" name="tenchapter" value="{{ old('tenchapter') }}"
                                    onkeyup="ChangeToSlug()" class="form-control" id="slug" placeholder="Nhập tên truyện.."
                                    aria-describedby="emailHelp" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                                    id="convert_slug" placeholder="Nhập slug.." aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt chapter</label><br>
                                <textarea class="form-control" name="tomtat" placeholder="Tóm tắt chapter.." rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label><br>
                                <textarea class="form-control" id="ckeditor" name="noidung" placeholder="Tóm tắt chapter.." rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc truyện</label>
                                <select name="truyen_id" class="custom-select">
                                    @foreach ($truyen as $key => $tr)
                                        <option value="{{ $tr->id }}">{{ $tr->tentruyen }}</option>
                                    @endforeach

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
