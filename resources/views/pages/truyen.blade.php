@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $truyen->theloai->tentheloai }}</li>
        </ol>
    </nav>
    <div class="row">

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <img class="card-img-top" height="350px" width="500px"
                        src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}"" >
                                                                        </div>
                            <div class=" col-md-6">
                    <style>
                        .infotruyen {
                            list-style: none;
                        }

                    </style>
                    <ul class="infotruyen">
                        <li>Tên truyện: {{ $truyen->tentruyen }}</li>
                        <li>Tác giả: {{ $truyen->tacgia }}</li>
                        <li>Danh mục: <a
                                href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a>
                        </li>
                        <li>Thể loại: <a
                                href="{{ url('the-loai/' . $truyen->theloai->slug) }}">{{ $truyen->theloai->tentheloai }}</a>
                        </li>
                        @php
                            $dem = count($chapter);

                        @endphp

                        <li> Số chapter:
                            @if ($dem > 0)

                                @php
                                    echo $dem;
                                @endphp
                            @else
                                Chưa có
                            @endif
                        </li>


                        <li><a href="">Xem mục lục</a></li>
                        <div class="fb-like" data-href="{{ \URL::current() }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                        <div class="fb-save" data-uri="{{ \URL::current() }}" data-size="large"></div>
                        <li></li>
                        @if ($chapter_dau)
                            <li><a class="btn btn-primary" href="{{ url('xem-chapter/' . $chapter_dau->slug) }}">Đọc
                                    online</a></li>
                        @else

                        <li><a class="btn btn-danger">Đang cập nhật..</a></li>

                        @endif
                    </ul>

                </div>




            </div>



            <div class="col-md-12">
                <p>
                    {{ $truyen->tomtat }}
                </p>
                <hr>
                <h3>MỤC LỤC</h3>
                <ul class="mucluctruyen">
                    @php
                        $mucluc = count($chapter);
                    @endphp
                    @if ($mucluc > 0)
                        @foreach ($chapter as $kay => $value)
                            <li><a href="{{ url('xem-chapter/' . $value->slug) }}">{{ $value->tieude }}</a></li>

                        @endforeach
                    @else
                        <li>Chưa có mục lục.....</li>
                    @endif



                </ul>
                <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="5"></div>
                <h3>TRUYỆN CÙNG DANH MỤC</h3>
                <div class="row">
                    <style type="text/css">
                        .card.mb-4.box-shadow img {
                            height: 250px;
                            border: 3px solid #000;
                            padding: 5px;
                        }

                        .item h5 {
                            margin: 10px 0;
                        }

                    </style>
                    @foreach ($truyencungdanhmuc as $key => $tr)

                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" height="300" width="100%"
                                    src="{{ asset('public/uploads/truyen/' . $tr->hinhanh) }}"" >
                                                                <div class=" card-body">
                                <h6 style="overflow: hidden;
                                        -webkit-line-clamp:2;
                                        -webkit-box-orient: vertical;
                                        display: -webkit-box; color:blue">{{ $tr->tentruyen }}</h6>
                                <p class="card-text" style="overflow: hidden;
                                                                -webkit-line-clamp: 3;
                                                                -webkit-box-orient: vertical;
                                                                display: -webkit-box;">{{ $tr->tomtat }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/' . $tr->slug) }}" class="btn btn-primary"">Đọc ngay</a>
                                                <a class=" btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>
                                            88888
                                            </p></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>
    <div class="col-md-3">
        <style type="text/css">
            .col-md-7.sidebar a {
                /* padding: 0; */
                font-size: 15px;
                text-decoration: none;
                color: #3490dc;
            }

            .col-md-7.sidebar {
                padding: 0;
            }

            /* .card-header {
                background: #3490dc !important;
                text-align: center;
            } */

            .mydiv {

                  color: black;
                  font-weight: bold;
                  animation: myanimation 10s infinite;
              }

              @keyframes myanimation {
                  0% {
                      background-color: rgb(255, 0, 200);
                  }

                  25% {
                      background-color: yellow;
                  }

                  50% {
                      background-color: green;
                  }

                  75% {
                      background-color: rgb(165, 42, 42);
                  }

                  100% {
                      background-color: rgb(0, 174, 255);
                  }
              }

        </style>
        <h3 class="card-header mydiv">Truyện mới</h3>
        @foreach ($truyenmoi as $key => $moi)
            <div class="row mt-2">

                <div class="col-md-5"><img class="img img-responsive" width="100px" height="100px" class="card-img-top"
                        src="{{ asset('public/uploads/truyen/' . $moi->hinhanh) }}" alt="{{ $moi->tentruyen }}">
                </div>

                <div class="col-md-7 sidebar">
                    <a href="{{ url('xem-truyen/' . $moi->slug) }}">
                        <p style="font-size: 25px">{{ $moi->tentruyen }}<br><i class="fas fa-eye"></i> @php echo rand(0,9999);@endphp
                        </p>

                    </a>
                </div>

            </div>

        @endforeach
        <h3 class="card-header mydiv">Truyện nổi bật</h3>
        @foreach ($truyennoibat as $key => $noibat)
            <div class="row mt-2">

                <div class="col-md-5"><img class="img img-responsive" width="100px" height="100px" class="card-img-top"
                        src="{{ asset('public/uploads/truyen/' . $noibat->hinhanh) }}" alt="{{ $noibat->tentruyen }}">
                </div>

                <div class="col-md-7 sidebar">
                    <a href="{{ url('xem-truyen/' . $noibat->slug) }}">
                        <p style="font-size: 25px">{{ $noibat->tentruyen }}<br><i class="fas fa-eye"></i> @php echo rand(0,9999);@endphp
                        </p>

                    </a>
                </div>

            </div>

        @endforeach
        <h3 class="card-header mydiv">Truyện xem nhiều</h3>
        @foreach ($truyenxemnhieu as $key => $xemnhieu)
            <div class="row mt-2">



                <div class="col-md-5"><img class="img img-responsive" width="100px" height="100px" class="card-img-top"
                        src="{{ asset('public/uploads/truyen/' . $xemnhieu->hinhanh) }}"
                        alt="{{ $xemnhieu->tentruyen }}"></div>

                <div class="col-md-7 sidebar">
                    <a href="{{ url('xem-truyen/' . $xemnhieu->slug) }}">
                        <p style="font-size: 25px">{{ $xemnhieu->tentruyen }}<br><i class="fas fa-eye"></i> @php echo rand(0,9999);@endphp</p>

                    </a>
                </div>


            </div>

        @endforeach
    </div>
    </div>

@endsection
