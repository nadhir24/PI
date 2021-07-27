@extends('layouts.main')
@section('content')
   
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
          <form action="{{ route('dashboard_artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (session('message'))
                <p class="text-success text-left"> {{ session('message') }}</p>
            @endif
            <div class="form-group">
              <label for="title">Judul Artikel</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter Judul"
                      value="{{ old('title') ?? $article->title }}">
            </div>
            @error('title')
                <p class="text-danger text-left"> {{ $message }}</p>
            @enderror
            
            {{-- {{ dd($article->category) }} --}}
            
            
            <div class="form-group">
              <label for="category">Kategori</label>
              <select class="form-control" id="category" name="category">
                <option value="">-- Pilih Kategori ---</option>
                <option value="Berita" 
                        @if (old('category') == 'Berita' OR $article->category == 'Berita')
                          selected
                        @endif> Berita
                </option>
                <option value="Analisa" 
                        @if (old('category') == 'Analisa' OR $article->category == 'Analisa')
                          selected
                        @endif> Analisa
                </option>
                <option value="Artikel" 
                        @if (old('category') == 'Artikel' OR $article->category == 'Artikel')
                          selected
                        @endif> Artikel
                </option>
              </select>
              @error('category')
                  <p class="text-danger text-left"> {{ $message }}</p>
              @enderror
            </div>

            {{-- <div class="form-group">
              <label for="img_thumbnail">Gambar Thumbnail</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="img_thumbnail" name="img_thumbnail">
                <label class="custom-file-label" for="img_thumbnail">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
                <small class="form-text text-muted">Optional</small>
              </div>
            </div> --}}

            <div class="form-group img_banner">
              <label for="img_banner">Gambar Banner</label>
              <div style="position: relative">
                <img src="{{ asset('images_article/' . $article->img_banner) }}" alt="" class="img-fluid" style="width: 400px; display: block">
                <button class="btn btn-sm btn-warning" type="button" style="position: absolute; top: 10px; left: 10px;" id="btn-edit-image">Edit</button>
              </div>
              <br>
              <div class="custom-file hidden">
                <input type="file" class="custom-file-input" id="img_banner" name="img_banner" value="{{ asset('images_article/' . $article->img_banner) }}">
                <label class="custom-file-label" for="img_thumbnail">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
              @error('img_banner')
                  <p class="text-danger text-left"> {{ $message }}</p>
              @enderror
            </div>

            {{-- <div class="form-group">
              <input type="file" name="img_banner">
            </div> --}}

            <div class="form-group">
              <label for="subject_article">Subject Article</label>
              <textarea name="subject_article" class="form-control" id="subject_article" cols="30" maxlength="800" rows="7">{{ old('subject_article') ?? $article->subject_article }}</textarea>
              {{-- <input type="text" class="form-control" id="subject_article" name="subject_article" placeholder="Enter Subject Article"
                      value="{{ old('subject_article') }}"> --}}
            </div>
            @error('subject_article')
                <p class="text-danger text-left"> {{ $message }}</p>
            @enderror


            
            <div class="form-group">
              <label for="article">Konten</label>
              <textarea class="form-control" id="article" rows="3" name="article">{{ old('article') ?? $article->article }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">
              Save
            </button>
            
          </form>
				</div>
				
			</div>
		</div>
</div>

@endsection

@section('script')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
  <script>
   var konten = document.getElementById("article");
    CKEDITOR.replace(konten,{
     language:'en-gb',
     extraPlugins: 'language',
     extraPlugins: 'easyimage',
     cloudServices_tokenUrl: 'https://example.com/cs-token-endpoint',
    cloudServices_uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
   });
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      if ( fileName == '' ) {
        $(this).siblings(".custom-file-label").addClass("selected").html("Choose file...");
      } else {
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      }
    });

    $('#btn-edit-image').on('click', function() {
      $('.custom-file').toggleClass('hidden');
    });
    // CKEDITOR.config.allowedContent = true;
    // CKEDITOR.editorConfig = function( config ) {
    //  config.extraPlugins = 'language';
    // };
  </script>
@endsection 

@section('style')

<style scoped>
  .form-group.img_banner {
    position: relative;
  }

  .hidden {
    display: none;
  }

</style>

@endsection