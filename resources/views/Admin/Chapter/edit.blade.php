@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa chapter</div>
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


                        <form method="POST" action="{{ route('chapter.update',[$chapter->id]) }}" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chapter</label>
                                <input type="text" name="tenchapter" value="{{ $chapter->tieude }}"
                                    onkeyup="ChangeToSlug()" class="form-control" id="slug"
                                    aria-describedby="emailHelp" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" value="{{ $chapter->slug }}" class="form-control"
                                    id="convert_slug"  aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt chapter</label><br>
                                <textarea class="form-control" name="tomtat"  rows="5" style="resize: none">{{ $chapter->tomtat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label><br>
                                <textarea class="form-control" id="ckeditor" name="noidung"  rows="5" style="resize: none">{{ $chapter->noidung }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc truyện</label>
                                <select name="truyen_id" class="custom-select">
                                    @foreach ($truyen as $key => $tr)
                                        <option {{ $chapter->truyen_id == $tr->id ? 'selected' : '' }} value="{{ $tr->id }}">{{ $tr->tentruyen }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="trangthai" class="custom-select">
                                    @if ($chapter->trangthai==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                    @else
                                    <option  value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @endif

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
