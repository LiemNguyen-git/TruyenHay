@extends('layouts.app')

@section('content')
    @include('layouts.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa danh mục truyện</div>
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


                        <form method="POST" action="{{route('danhmuc.update',[$danhmuc->id])}}">
                            @method("PUT")
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="tendanhmuc" class="form-control"
                                    value="{{ $danhmuc->tendanhmuc }}" aria-describedby="emailHelp" onkeyup="ChangeToSlug()" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug danh mục</label>
                                <input type="text" name="slug" class="form-control" id="convert_slug"
                                value="{{ $danhmuc->slug }}" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả danh mục</label>
                                <input type="text" name="mota" class="form-control" id="exampleInputEmail1"
                                value="{{ $danhmuc->mota }}" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="trangthai" class="custom-select">
                                    @if ($danhmuc->trangthai==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                    @else
                                    <option  value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @endif

                                </select>
                            </div>
                            <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập nhật</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
