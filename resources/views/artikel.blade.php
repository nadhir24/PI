@extends('layouts.app')
@section('content')
    <section class="clean-block features">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">ARTIKEL</h2>
                <p>selamat datang di halaman artikel dimana anda bisa melihat tips,trik hingga kisah sukses para trader diseluruh dunia</p>
                <hr>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6"><img src="{{ asset('/img/scenery/Trading-Forex.jpeg') }}" style="width: 525px;">
                    <h3 class="text-center"><a href="{{ route('asalusul') }}">asal usul forex</a><br></h3>
                    <p>di artikel ini anda akan belajar apa itu forex dan bagaimana forex bisa di perdagangkan secara bebas menggunakan leverage melalui hp</p>
                </div>
                <div class="col-md-6"><img src="{{ asset('/img/scenery/apa-itu-price-action-123001-1.jpg') }}" style="width: 517px;">
                    <h3 class="text-left"><a href="{{ route('price_action') }}">Mengenal istilah price action<br></a></h3>
                    <p class="text-justify">seberapa penting menggunakan price action dalam trading? di dalam artikel ini akan kami jawab</p>
                </div>
                <div class="col-md-6"><img src="{{ asset('/img/scenery/[article_02]_support_resistance-isi.jpg') }}" style="width: 522px;">
                    <h3 class="text-center"><a href="{{ route('snr') }}">support dan resistance</a></h3>
                    <p>pada artikel ini anda akan belajar cara menandakan support dan resistance pada chart</p>
                </div>
                <div class="col-md-6"><img src="{{ asset('/img/scenery/shutterstock_644600752.jpg') }}" style="width: 512px;">
                    <h3><a href="{{ route('mm') }}" style="text-align: justify;">Money management dalam forex<br></a></h3>
                    <p class="text-left">bagaimana kalau memanajemen uang itu bisa di sebut seni&gt;?</p>
                </div>
                <div class="col-md-6"><img src="{{ asset('/img/scenery/penggunaan-indikator-moving-average.jpg') }}"  style="width:505px; height: 299.5px;">
                    <h4 class="text-center"><a href="{{ route('bbmarsi') }}"><br>indikator MA,RSI,Bollinger Band<br><br></a></h4>
                    <p class="text-center">mengenal indikator yang paling sering di pakai oleh trader baru maupun yang sudah ahli</p>
                </div>
                <div class="col-md-6"><img src="{{ asset('/img/avatars/139856_orig.png') }}" style="width: 505px;">
                    <h3><a href="CMS.html">trading ala cikgu mansor sapari<br></a></h3>
                    <p class="text-justify">salah&nbsp; satu trader malaysia yang punya trik "GILA" bisa hasilkan puluhan bahkan ratusan persen dalam 2 atau 3 kali trading</p>
                </div>
            </div>
        </div>
    </section>
@endsection