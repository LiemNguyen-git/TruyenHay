@extends('../layout')

{{-- @section('slide')

  @include('pages.slide')

@endsection --}}

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ url('danh-muc/' . $truyen_breadcrumd->danhmuctruyen->slug) }}">{{ $truyen_breadcrumd->danhmuctruyen->tendanhmuc }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $truyen_breadcrumd->theloai->tentheloai }}</li>
    </ol>
</nav>


    <div class="row">

        <div class="col-md-12">

            <h4>{{ $chapter->truyen->tentruyen }}</h4>

            <p>Chương hiện tại : {{ $chapter->tieude }}</p>

            <div class="col-md-5">
<style type="text/css">
    .isDisable{
        color: currentColor;
        pointer-events: none;
        opacity: 0.5;
        text-decoration:none;

    }
</style>
                <div class="form-group">

                    <label for="exampleInputEmail1">Chọn chương</label>

                    <select name="select-chapter"  class="custom-select select-chapter">
                        @foreach ($all_chapter as $key => $all )

                          <option value="{{ url('xem-chapter/'.$all->slug) }}">{{ $all->tieude }}</option>

                        @endforeach

                    </select>
               <p class="mt-4"><a class="btn btn-primary {{ $chapter->id==$min_id->id ? 'isDisable' : '' }}" href="{{ url('xem-chapter/'.$previous_chapter) }}">Tập trước</a><a class="btn btn-primary {{ $chapter->id==$max_id->id ? 'isDisable' : '' }}" href="{{ url('xem-chapter/'.$next_chapter) }}">Tập sau</a></p>

                </div>
            </div>

            <div class="noidungchuong">
                {!! $chapter->noidung !!}
            </div>
            <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="5"></div>

        </div>
    </div>



@endsection
