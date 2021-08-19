<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Truyensach.vn</title>
    <link rel="icon" href="https://www.freepik.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <div class="container">
        {{-- menu --}}
        <style type="text/css">
            ul.navbar-nav.mr-auto li a {
                font-size: 20px;
            }

            .card.mb-3.box-shadow img {
                height: 250px;
                border: 3px solid #000;
                padding: 5px;
            }

            .item h5 {
                margin: 10px 0;
            }

        </style>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mydiv">
            <a class="navbar-brand" href="{{ url('/') }}"><img alt="logo"
                    src="{{ asset('public/uploads/logo.png') }}" width="250px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Trang chủ <span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($danhmuc as $key => $dm)
                                <a class="dropdown-item"
                                    href="{{ url('danh-muc/' . $dm->slug) }}">{{ $dm->tendanhmuc }}</a>

                            @endforeach

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể loại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($theloai as $key => $tl)
                                <a class="dropdown-item"
                                    href="{{ url('the-loai/' . $tl->slug) }}">{{ $tl->tentheloai }}</a>

                            @endforeach

                        </div>
                    </li>

                </ul>

                <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{ url('tim-kiem') }}"
                    method="GET">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa"
                        placeholder="Bạn tìm truyện gì nè.." aria-label="Search">
                    <div id="search_ajax"></div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                </form>
            </div>
        </nav>

        @yield('slide')
        @yield('content')


        {{-- footer --}}
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>LIÊN HỆ VỚI CHÚNG TÔI QUA:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>TRUYỆN HAY
                            </h6>
                            <p>
                                Website đọc truyện online chất lượng hàng đầu việt nam, với nhiều truyện tiên hiệp,
                                truyện kiếm hiệp, truyện ngôn tình, truyện teen, truyện đô thị được tác giả và dịch giả
                                chọn lọc và đăng tải. Truy cập website nghĩa là bạn đã đồng ý với các quy định và điều
                                khoản của chúng tôi. Vui lòng đọc kỹ các thông tin liên quan ở phía dưới.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Products
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Angular</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">React</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vue</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Laravel</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Pricing</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Settings</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Orders</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contact
                            </h6>
                            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@example.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>



    <script src="{{ asset('js/app.js') }}" defer></script>
    <script text="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    {{-- <script type="text/javascript">
        $('#keywords').keyup(function() {
            var keywords = $(this).val();

            if (keywords != '') {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ url('/timkiem-ajax') }}",
                    method: "GET",
                    data: {
                        keywords: keywords,
                        _token: _token
                    },
                    success:function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });

            } else {

                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script> --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0"
        nonce="t7JiDLgr"></script>

    <script type="text/javascript">
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })
    </script>

    <script type="text/javascript">
        $('.select-chapter').on('change', function() {
            var url = $(this).val();
            if (url) {

                window.location = url;
            }
            return false;
        });
        current_chapter();

        function current_chapter() {
            var url = window.location.href;

            $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
        }
    </script>
</body>

</html>
