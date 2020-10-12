<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Title</td>
            <td width="120">Author</td>
            <td width="150">Category</td>
            <td width="170">Date</td>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>
        @foreach($posts as $post)

            <tr>
                <td>
                {!! Form::open(['method' => 'PUT', 'route' => ['other.restore',$post->id]]) !!}
                @if(check_user_permissions($request,"AdminController@restore",$post->id))
                    <button type="submit" class="btn btn-primary "><i class="fa fa-refresh"></i> </button>
                @else    
                    <button type="submit" class="btn btn-primary disabled"><i class="fa fa-refresh"></i> </button>
                @endif
                {!! Form::close() !!}
                    
                    {!! Form::open(['method' => 'DELETE','route' => ['other.forceDestroy',$post->id]]) !!}
                    @if(check_user_permissions($request,"AdminController@forceDestroy",$post->id))
                    <button type="submit"  class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                    @else
                    <button type="submit"  class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-trash"></i>
                    </button>
                    @endif
                    {!! Form::close() !!}
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                    <abbr title="{{$post->dateFormatted(true)}}"> {{$post->dateFormatted()}} </abbr>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>

