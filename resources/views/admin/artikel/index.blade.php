@extends('layouts.main')
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

<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      

      <div class="modal-body">
        <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
      </div>
    </div>
  </div>
</div>



<div class="row">
    <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
          <h2>Form Input <small>Enter Shipping Document Data</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown" id="dropdown1">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a class="dropdown-item"
                    href="">Condition 1</a>
                </li>
                
              </ul>
            </li>
            </li>
          </ul>
          <div class="clearfix"></div>
						{{-- <h3>Form Input <small style="font-size: 12px">Input data according to shipping documents</small></h3> --}}
				</div>
				
				<div class="x_content">
          <br>
          <div class="container">
            <div class="row">
              @if (session('message'))
                  <div class="col-12">
                    <div class="alert alert-success" role="alert">
                      {{ session('message') }}
                    </div>
                  </div>
              @endif
              

              @foreach ($data_artikel as $item)
                <div class="col-12 col-sm-8 col-md-6 col-lg-3">
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
                      <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-info btn-sm">Read More</a>
                      <a href="{{ route('dashboard_artikel.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      {{-- <a href="{{ route('dashboard_artikel.destroy', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                       --}}
                       <form method="POST" action="{{ route('dashboard_artikel.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Article" data-message="Are you sure you want to delete this article ?">
                              <i class="glyphicon glyphicon-trash"></i> Delete
                          </button>
                      </form>
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
				</div>
				
			</div>
		</div>
</div>

@endsection

@section('script')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
  <script>
    // <!-- Dialog show event handler -->
      $('#confirmDelete').on('show.bs.modal', function (e) {
          $message = $(e.relatedTarget).attr('data-message');
          $(this).find('.modal-body p').text($message);
          $title = $(e.relatedTarget).attr('data-title');
          $(this).find('.modal-title').text($title);

          // Pass form reference to modal for submission on yes/ok
          var form = $(e.relatedTarget).closest('form');
          $(this).find('.modal-footer #confirm').data('form', form);
      });

      // <!-- Form confirm (yes/ok) handler, submits form -->
      $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
          $(this).data('form').submit();
      });
  </script>
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