@extends('layouts.app')
@section('content')

@php
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
@endphp

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
              @foreach ($data_artikel as $item)
                    {{-- <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">
                            <img src="https://3.bp.blogspot.com/-bAsTyYC8U80/VtLZRKN6OlI/AAAAAAAABjY/kAoljiMALkQ/s400/material%2Bnavbar.jpg" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html"> Material kocak Responsive Menu
                                  </a>
                                </h4>
                                <p class="">
                                    Material Design is a visual programming language made by Google. Language programming...
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="https://codepen.io/wisnust10/full/ZWERZK/" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div> --}}

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                  <div class="card">
                    <img class="card-img post-thumbnail" src="{{ asset('/images_article/' . $item->img_banner) }}" alt="Bologna">
                    <div class="card-img-overlay">
                      <a href="#" class="btn btn-success btn-sm">{{ $item->category }}</a>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title"><a href="{{ route('artikel.show', $item->id) }}" class="link-title">{{ $item->title }}</a></h6>
                      
                      
                      <small class="text-muted cat"> 
                        <i class="far fa-clock text-info"></i> {{ time_elapsed_string($item->created_at) }} &nbsp;
                        <i class="fas fa-user text-info"></i> {{ $item->author }}
                      </small>
                      <p class="card-text">
                        {!! $item->subject_article !!}
                      </p>
                      <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-sm btn-info">Read More</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                      <div class="views">{{ date("d/M/y", strtotime($item->created_at)) }}
                      </div>
                      {{-- <div class="stats">
                        <i class="far fa-eye"></i> 1347
                        <i class="far fa-comment"></i> 12
                      </div> --}}
                      
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>
@endsection

@section('style')

<style scoped>
  .card {
    
    display: block; 
      margin-bottom: 20px;
      line-height: 1.42857143;
      background-color: #fff;
      border-radius: 2px;
      box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
      transition: box-shadow .25s; 
  }

  .card .link-title {
    color: #000;
    cursor: pointer;
  }

  
  .card:hover {
    box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  }
  .img-card {
    width: 100%;
    height:200px;
    border-top-left-radius:2px;
    border-top-right-radius:2px;
    display:block;
      overflow: hidden;
  }
  .img-card img{
    width: 100%;
    height: 200px;
    object-fit:cover; 
    transition: all .25s ease;
  } 
  .card-content {
    padding:15px;
    text-align:left;
  }
  .card-title {
    color: black;
    cursor: pointer;
    margin-top:0px;
    font-weight: 700;
    font-size: 1.4em;
  }
  .card-title a {
    color: #000;
    text-decoration: none !important;
  }
  .card-read-more {
    border-top: 1px solid #D4D4D4;
  }
  .card-read-more a {
    text-decoration: none !important;
    padding:10px;
    font-weight:600;
    text-transform: uppercase
  }

body {
  padding: 2rem 0rem;
}

.card-img {
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}

.card-title {
  margin-bottom: 0.3rem;
}

.card-body {
  position: relative;
  z-index: 2;
}

.cat {
  display: inline-block;
  margin-bottom: 1rem;
}

.fa-users {
  margin-left: 1rem;
}

.card-footer {
  font-size: 0.8rem;
}

.card-img-overlay {
  z-index: 1;
}

.post-thumbnail {
position: relative;
    overflow: hidden;
    float: left;
    width: 100%;
    height: 210px;
    margin-bottom: 12px;
}


</style>

@endsection