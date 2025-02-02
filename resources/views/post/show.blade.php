@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200"> {{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}} •
                {{$date->format('H:i')}} • {{$post->coments->count()}} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">

                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}

                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-1">

                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <span>{{$post->liked_users_count}}</span>
                            <button type="submit" class="border-0 bg-transparent">
                                @auth()
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                @endauth



                            </button>
                        </form>

                    </section>
                    @if($relationPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                        <div class="row">
                            @foreach($relationPosts as $related_post)
                                <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
                                    <img src="{{asset('storage/' . $related_post->main_image)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{$related_post->category->title}}</p>
                                    <a href="{{route('post.show', $related_post->id)}}"><h5
                                            class="post-title">{!! $related_post->title !!}</h5></a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-list mb-1">
                        @foreach($post->coments as $comment)
                            <div class="comment-text mb-3">
                                <span class="username">
                                 <div>
                                     {{$comment->user->name}}
                                 </div>

                                  <span class="text-muted float-right">{{$comment->dateComment->diffForHumans()}}</span>
                                </span>
                                {{$comment->message}}<!-- /.username -->
                            </div>
                        @endforeach
                    </section>
                    @auth()

                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить коментарий</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Оставьте коментарий" rows="10"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Добавить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
