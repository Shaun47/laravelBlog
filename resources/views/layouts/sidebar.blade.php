        <div class="col-lg-3 ml-auto">
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



            <div class="section-title">
              <h2>Categories</h2>
            </div>


            @foreach($categories as $category)
            <div class="trend-entry d-flex">
              <div class="number align-self-start">0{{$loop->index+1}}</div>
              <div class="trend-contents">
                <h2><a href="{{ route('category',$category->slug) }}">{{$category->title}}</a><span class="badge badge-secondary ml-3">{{$category->posts->count()}}</span></h2>
              </div>
            </div>
            @endforeach

            
            
          </div>


