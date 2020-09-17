@extends('layouts.main')

@section('content')
<div class="col-lg-8 single-content">
            
            <p class="mb-5">
              <img src=" {{ $post->image_url }} " alt="Image" class="img-fluid">
            </p>  
            <h1 class="mb-4">
              {{$post->title}}
            </h1>
            <div class="post-meta d-flex mb-5">
              <div class="bio-pic mr-3">
                <img src="{{$post->author->gravatar()}}" alt="No Image" class="img-fluidid">
              </div>
              <div class="vcard">
                <span class="d-block"><a href="{{route('author',$post->author->slug)}}"> {{$post->author->name}} </a> in <a href="#">News</a></span>
                <span class="date-read"> {{ $post->date }} <span class="icon-star2"></span></span>
              </div>
            </div>

            {!! $post->body_to_html !!}
            



            <div class="pt-5">
                    <p>Category:  <a href="{{ route('category',$post->category->slug) }}">{{$post->category->title}}</a> </p>
                  </div>
      
<!-- comments here -->
                    @include('layouts.comments')
          </div>
@endsection





