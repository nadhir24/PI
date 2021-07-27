@extends('layouts.app')
@section('content')
    
<section class="clean-block features pb-0">
    <section class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center">{{ $article->title }}</h1>
                        <p class="text-center"><span class="by">by</span> <a href="#">{{ $article->author }}</a><span class="date">{{ date('d-M-Y',  strtotime($article->created_at)) }} </span></p><img class="img-fluid" src="{{ asset('/images_article/' . $article->img_banner) }}">
                    </div><span>source google</span>
                    <div class="text" data-articleId="{{ $article->id }}">
                        {!! $article->article !!}
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <h2>Comment</h2>
                    
                    
                    

                        <div class="d-flex flex-column comment-section">
                            @if (auth()->user())
                                <div class="mb-3">
                                    <span class="text-success">85</span>
                                    <button class="like" data-lod='like' onclick="likeOrDislike(this)">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </button>
                                    &nbsp;
                                    
                                    <span class="text-danger">85</span>
                                    <button class="dislike" data-lod='dislike' onclick="likeOrDislike(this)">
                                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                    </button>
                                </div>

                            @endif
                            <div id="box-article">
                            
                            </div>
                            @if (auth()->user())
                                
                                
                                


                                {{-- <div class="bg-white">
                                    <div class="d-flex flex-row fs-12">
                                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                                    </div>
                                </div> --}}

                                <div class="comment-input">
                                    <div class="bg-light p-2">
                                        {{-- <form action="/article_comment" method="POST"> --}}
                                            {{-- @csrf --}}
                                            <div class="d-flex flex-row align-items-start">
                                                {{-- <img class="rounded-circle" src="{{ asset('images_profile/ava1.jpg') }}" width="40"> --}}
                                                @csrf
                                                <input type="hidden" value="{{ auth()->user()->id }}" id="user">
                                                <textarea class="form-control ml-1 shadow-none textarea" name="comment" placeholder="Enter Comment" rows="5"></textarea>
                                            </div>
                                            <div class="mt-2 text-right">
                                                <button class="btn btn-primary btn-sm shadow-none" type="submit" id="btn-post">Post comment</button>
                                                <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>

                            @else 
                            
                                <div class="alert alert-warning" role="alert">
                                    Login untuk berkomentar
                                </div>
                            @endif
                        </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
</section>

@endsection

@section('script')
    <script>
        
        var user_id = $('input#user').val();
        var token = $(this).parent().siblings().find('input').val();
        var user_id = $('input#user').val();
        var article_id = $('[data-articleId]').data('articleid');

        function likeOrDislike(el) {
            console.log(el);
        }

        function deleteComment(el) {
            let id = $(el).data('id');
                axios.post('/delete_comment', {
                    _token: token,
                    _method: 'DELETE',
                    id: id,
                    article_id: article_id
                })
                .then(function (response) {
                    console.log(response.data)
                    $('#box-article').html('');
                    getCommentArticle(article_id);
                    comment.val('');

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        
        function getCommentArticle(article_id) {
            axios.get('/getCommentArticle/' + article_id)
                .then(function (response) {
                    response.data.forEach(comment => {
                        if(comment.user_id == user_id) {
                            var button_delete = `<button class='btn btn-sm btn-danger' data-id='${comment.id_c}' onclick='deleteComment(this)'>Delete</button>`;
                        } else {
                            var button_delete = '';
                        }
                        
                        
                        $('#box-article').append(`
                            <div class="bg-white p-2 comment mb-3" data-articleIndex=''>
                                ${button_delete}
                                <div class="d-flex flex-row user-info">
                                    <div class="d-flex flex-column justify-content-start ml-2">
                                        <span class="d-block font-weight-bold name">${ comment.name }</span>
                                        <span class="date text-black-50">Shared publicly - ${moment(comment.created_at).format('DD-MMM-YYYY')} </span>

                                    </div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text">
                                        ${ comment.comment }
                                    </p>
                                </div>
                            </div>
                        `);
                    });
                         
                    // console.log(response.data);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
        
        $(document).ready(function() {
            let article_id = $('[data-articleId]').data('articleid');
            getCommentArticle(article_id);

            $('#btn-post').click(function(el) {
                let comment = $(this).parent().siblings().find('textarea').val();
                $(this).parent().siblings().find('textarea').val('');
                
                // console.log(article_id);

                axios.post('/article_comment', {
                    _token: token,
                    comment: comment,
                    user_id: user_id,
                    article_id: article_id,
                })
                .then(function (response) {
                    $('#box-article').html('');
                    getCommentArticle(article_id);
                    comment.val('');

                })
                .catch(function (error) {
                    console.log(error);
                });
            })
        });
    </script>
@endsection

@section('style')
    <style scoped>

    .comment {
        background-color: white !important;
        box-shadow: 2px 2px 8px rgba(0,0,0,.1);
        position: relative;
    }

    .comment button {
        position: absolute;
        right: 0;
    }

    
        
    .date {
        font-size: 11px
    }

    .comment-text {
        font-size: 12px
    }

    .fs-12 {
        font-size: 12px
    }

    .shadow-none {
        box-shadow: none
    }

    .name {
        color: #007bff
    }

    .cursor:hover {
        color: blue
    }

    .cursor {
        cursor: pointer
    }

    .textarea {
        resize: none
    }
    button.like{
        width: 30px;
        height: 30px;
        margin: 0 auto;
        line-heigth: 30px;
        border-radius: 50%;
        color: rgba(0,150,136 ,1);
        background-color:rgba(38,166,154 ,0.3);
        border-color: rgba(0,150,136 ,1);
        border-width: 1px;
        font-size: 15px;
    }

    button.dislike{
        width: 30px;
        height: 30px;
        margin: 0 auto;
        line-heigth: 50px;
        border-radius: 50%;
        color: rgba(255,82,82 ,1);
        background-color: rgba(255,138,128 ,0.3);
        border-color: rgba(255,82,82 ,1);
        border-width: 1px;
        font-size: 15px;
        transform: rotateY(180deg);
    }
    
    </style>
@endsection

