@extends('layouts.app')
@section('content')
    
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Kontak Kami</h2>
                    <p>jika di rasa ada kritik atau saran silahkan</p>
                </div>
                <form>
                    <div class="form-group"><label for="name">Name</label><input class="form-control" type="text" id="name" name="name"></div>
                    <div class="form-group"><label for="subject">Subjek</label><input class="form-control" type="text" id="subject" name="subject"></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control" type="email" id="email" name="email"></div>
                    <div class="form-group"><label for="message">Pesan</label><textarea class="form-control" id="message" name="message"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">kirim</button></div>
                </form>
            </div>
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
