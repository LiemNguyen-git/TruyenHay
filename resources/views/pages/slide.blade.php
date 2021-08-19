 {{-- slider --}}
 <div class="owl-carousel owl-theme mt5">

     @foreach ($truyen as $key => $tr )
     <div class="item ">
        <img height="200px" width="100px" src="{{ asset('public/uploads/truyen/'.$tr->hinhanh) }}">
        <h5 style="overflow: hidden;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        display: -webkit-box;">{{ $tr->tentruyen }}</h5>
        <style type="text/css">
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
        <p>
            <a class="btn btn-danger btn-sm mydiv" href="{{ url('xem-truyen/'.$tr->slug) }}">Đọc ngay</a>
           &emsp; <i class="fas fa-eye"></i> @php echo rand(0,9999);@endphp
        </p>

    </div>
     @endforeach

</div>

