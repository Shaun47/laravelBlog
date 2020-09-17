@extends('layouts.main')

@section('content')
          <div class="col-lg-8 single-content">
              <div class="row">
                <div class="col-md-12">
                    @if(! $posts->count())
                    <h2>Nothing found</h2>
                    @else
                      @if(isset($categoryName))
                        <h2>Category: <strong>{{$categoryName}}</strong></h2>
                      @endif

                      @if(isset($authorName))
                        <h2>Author: <strong>{{$authorName}}</strong></h2>
                      @endif


                    @foreach($posts as $post)
                    <div class="post-entry-1">
                      
                      <h2><a href="{{ route('blog.show',$post->slug) }}">{{$post->title}}</a></h2>

                      {!! $post->excerpt_to_html !!} <a href="{{ route('blog.show',$post->slug) }}">continue reading</a>
                      </p>
                      <div class="post-meta">
                        <span class="d-block"><a href="{{route('author',$post->author->slug)}}">{{ $post->author->name }}</a> in <a href="#">News</a></span>
                        <span class="date-read"> {{ $post->date }} <span class="icon-star2"></span></span>
                      </div>
                    </div>
                  @endforeach

                   <nav>
                     {{$posts->links()}}
                   </nav>
                  @endif
                  </div>
                  
                </div>


          </div>
@endsection





