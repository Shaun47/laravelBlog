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
        @foreach($posts as $post)

            <tr>
                <td>
                {!! Form::open(['method' => 'PUT', 'route' => ['other.restore',$post->id]]) !!}

                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> </button>
                {!! Form::close() !!}
                    
                    {!! Form::open(['method' => 'DELETE','route' => ['other.forceDestroy',$post->id]]) !!}
                    <button type="submit"  class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
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

