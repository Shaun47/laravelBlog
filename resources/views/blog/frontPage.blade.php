@extends('layouts.frontPage')


@section('content')

    <div class="site-section py-0">
      <div class="owl-carousel hero-slide owl-style">
      @foreach($posts as $post)
        <div class="site-section">
          <div class="container">

            
            <div class="half-post-entry d-block d-lg-flex bg-light">
              <div class="img-bg" style="background-image: url('{{ $post->image_url }}')"></div>
              <div class="contents">
                <span class="caption">Editor's Pick</span>
                <h2><a href="{{ route('blog.show',$post->slug) }}"> {{ $post->title }} </a></h2>
                {!! $post->excerpt_to_html !!} <a href="{{ route('blog.show',$post->slug) }}">continue reading</a>
                
                <div class="post-meta">
                        <span class="d-block"><a href="{{route('author',$post->author->slug)}}">{{ $post->author->name }}</a> in <a href="#">News</a></span>
                        <span class="date-read"> {{ $post->date }} <span class="icon-star2"></span></span>
                </div>

              </div>
            </div>

           

          </div>
        </div>

        @endforeach


      </div>
    </div>
  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            
            <div class="row">
              <div class="col-12">
                <div class="section-title">
                  <h2>Most Recent</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                
                <div class="post-entry-1">
                  <a href="post-single.html"><img src=" {{ $most_recent_post->image_url }} " alt="Image" class="img-fluid"></a>
                  <h2><a href="{{ route('blog.show',$most_recent_post->slug) }}"> {{ $most_recent_post->title }} </a></h2>
                  {!! $most_recent_post->excerpt_to_html !!} <a href="{{ route('blog.show',$most_recent_post->slug) }}">continue reading</a>
                  <div class="post-meta">
                        <span class="d-block"><a href="{{route('author',$most_recent_post->author->slug)}}">{{ $most_recent_post->author->name }}</a> in <a href="#">News</a></span>
                        <span class="date-read"> {{ $most_recent_post->date }} <span class="icon-star2"></span></span>
                </div>
                </div>
              
              </div>
              <div class="col-md-6">
                
                @foreach($recentPosts as $post)
                <div class="post-entry-2 d-flex">
                <img src=" {{ $post->image_url }} " alt="Image" class="img-fluid"  style="width:120px; height:100px;">
                  <div class="contents">
                  <h2><a href="{{ route('blog.show',$post->slug) }}"> {{ $post->title }} </a></h2>
                  
                  <div class="post-meta">
                        <span class="d-block"><a href="{{route('author',$post->author->slug)}}">{{ $post->author->name }}</a> in <a href="#">News</a></span>
                        <span class="date-read"> {{ $post->date }} <span class="icon-star2"></span></span>
                </div>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="section-title">
              <h2>Popular Posts</h2>
            </div>

            @foreach($popularPosts as $popularPost)
            <div class="trend-entry d-flex">
              <div class="number align-self-start"> 0{{$loop->index+1}} </div>
              <div class="trend-contents">
                <h2><a href="{{ route('blog.show',$popularPost->slug) }}">{{$popularPost->title}}</a></h2>
                <div class="post-meta">
                  <span class="d-block"><a href="{{route('author',$popularPost->author->slug)}}">{{$popularPost->author->name}}</a> in <a href="#">News</a></span>
                  <span class="date-read"> {{$popularPost->date}} <span class="icon-star2"></span></span>
                </div>
              </div>
            </div>
            @endforeach


            

            

          </div>
        </div>
      </div>
    </div>
    <!-- END section -->







    <div class="site-section subscribe bg-light">
      <div class="container">
        <form action="#" class="row align-items-center">
          <div class="col-md-5 mr-auto">
            <h2>Newsletter Subcribe</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="d-flex">
              <input type="email" class="form-control" placeholder="Enter your email">
              <button type="submit" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
            </div>
          </div>
        </form>
      </div>
    </div>


@endsection