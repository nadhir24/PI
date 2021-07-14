@extends('layouts.app')
@section('content')


<section class="clean-block clean-hero" style="color: rgba(0,161,252,0.76);background: url(&quot;{{ asset('/img/tech/frx.jpg') }}&quot;), var(--purple);border-color: rgb(8,159,251);">
  <div class="text">
      <h2 style="color: rgb(255,255,255);">Belajar Trading FOREX</h2>
      <p>disini anda akan belajar tentang awal mula forex sampai bagaimana cara trading forex yang benar</p><button class="btn btn-outline-light btn-lg" type="button">Learn More</button>
  </div>
</section>
<section class="clean-block clean-info dark">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info" style="font-family: Lora, serif;">tempatnya edukasi forex</h2>
        </div>
        <p style="text-align: center;">selamat datang di website kami anda akan belajar tentang bagaimana cara trading hingga mengelola dana menjadi besar dan tentu saja anda akan menjadi displin<br></p>
    </div>
</section>
<section class="clean-block features">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">Features</h2>
            <p>apa saja keuntungan dari belajar disini?</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                <h4>CERDAS</h4>
                <p>tercerdaskan oleh ilmu yang akan di berikan oleh orang yang sudah berpengalaman&nbsp;</p>
            </div>
            <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                <h4>ada pelatihan khusus setiap <em>weekend</em></h4>
                <p>silahkan kontak admin jika bersedia di <em>tab </em>kontak</p>
            </div>
            <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                <h4>Update Berita Terkini</h4>
                <p>selalu mendapatkan berita terkini hingga artikel artikel terbaru</p>
            </div>
            <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                <h4>kompatibel dengan semua perangkat</h4>
                <p>bisa di akses dimana saja dan kapan saja anda mau</p>
            </div>
        </div>
    </div>
</section>
<section class="clean-block slider dark">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">galeri</h2>
            <p><br>belajar bagaimana cara entry yang sangat tepat berdasarkan Supply dan Demand,Support dan Resistance dan berbagai indikator<br><br></p>
        </div>
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block d-inline" src="{{ asset('/img/scenery/trade.png') }}" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset('/img/scenery/Trading-Forex.jpeg') }}" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
            </ol>
        </div>
    </div><iframe allowfullscreen="" frameborder="0" loading="lazy" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDI5OVWxnWHen9HxVp6QJ1GcLqB8tkf5BE&amp;q=East+Jakarta&amp;zoom=16" width="100%" height="400" style="padding: 45px;height: 404px;margin: -6px;"></iframe>
</section>
<section class="clean-block about-us">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">About Us</h2>
            <p>di mulai dari kesadaran admin akan penting nya menjaga posisi dan menjaga dana agar tetap ada dan terus berkembang maka admin membuat website ini</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-lg-4">
                <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="{{ asset('/img/avatars/avatar2.jpg') }}">
                    <div class="card-body info">
                        <h4 class="card-title">Nadhir Ghassan</h4>
                        <p class="card-text">Pengen Jadi Trader yang Handal</p>
                        <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection