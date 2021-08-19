@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $tentheloai }}</li>
    </ol>
</nav>
    {{-- sách mới nhất --}}
    <h3 style="text-align: center">{{ $tentheloai }}</h3>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @php

                    $count = count($truyen);

                @endphp

                @if ($count == 0)

                    <div class="col-md-12">

                        <div class="card mb-12 box-shadow">

                            <div class="card-body">

                                <p>Truyện đang cập nhật...</p>

                            </div>
                        </div>

                    </div>

                @else
                    @foreach ($truyen as $key => $tr)

                        <div class="col-md-3">
                            <div class="card mb-3 box-shadow">
                                <img class="card-img-top" height="300" width="100%"
                                    src="{{ asset('public/uploads/truyen/' . $tr->hinhanh) }}"" >
                        <div class=" card-body">
                                <h6 style="overflow: hidden;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                display: -webkit-box;color:blue">{{ $tr->tentruyen }}</h6>
                                <p class="card-text" style="overflow: hidden;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                display: -webkit-box;">{{ $tr->tomtat }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/' . $tr->slug) }}"
                                            class="btn btn-primary">Đọc ngay</a>
                                        <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>  @php echo rand(0,9999);@endphp</p></a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>


    </div>



@endsection
