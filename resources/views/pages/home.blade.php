@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')
    {{-- sách mới nhất --}}
    <h3 style="text-align: center">TRUYỆN MỚI NHẤT</h3>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach ($truyen as $key => $tr)

                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" height="300" width="100%" src="{{ asset('public/uploads/truyen/'.$tr->hinhanh) }}"" >
                <div class=" card-body">
                            <h6 style="overflow: hidden;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            display: -webkit-box; color:blue">{{ $tr->tentruyen }}</h6>
                            <p class="card-text" style="overflow: hidden;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            display: -webkit-box;">{{$tr->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('xem-truyen/'.$tr->slug) }}" class="btn btn-primary">Đọc ngay</a>
                                    <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> @php
                                        echo rand(0,9999);
                                    @endphp</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach

        </div>
        <a class="btn btn-success" href="">Xem tất cả</a>

    </div>


    </div>



@endsection
