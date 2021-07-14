@extends('layouts.app')
@section('content')
        <section class="clean-block features">
            <section class="article-clean">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                            <div class="intro">
                                <h1 class="text-center">Price Action</h1>
                                <p class="text-center"><span class="by">by</span> <a href="#">Author Name</a><span class="date">Sept 8th, 2016 </span></p><img class="img-fluid" src="{{ asset('/img/desk.jpg') }}">
                            </div>
                            <div class="text">
                                <p><strong>Price action</strong>&nbsp;merupakan pergerakan harga suatu aset atau suatu pair mata uang. Analisa price action merujuk pada analisa teknikal berdasarkan pergerakan harga di masa lampau, di mana trader berupaya menemukan pola dalam pergerakan harga yang sepintas nampak acak.<br></p>
                                <h2>Aliquam In Arcu </h2>
                                <p>Suspendisse vel placerat ligula. Vivamus ac sem lac. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                <figure class="figure d-block"><img class="figure-img" src="{{ asset('/img/beach.jpg') }}">
                                    <figcaption>Caption</figcaption>
                                </figure>
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Suspendisse vel placerat ligula. Vivamus ac sem lac. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="page-footer dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Get started</h5>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Sign up</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <h5>About us</h5>
                            <ul>
                                <li></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <h5>Support</h5>
                            <ul>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <h5>Legal</h5>
                            <ul>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <p>© 2021 Copyright Text</p>
                </div>
            </footer>
        </section>
@endsection
