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
                    <a href="{{ route('other.edit', $post->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    {!! Form::open(['method' => 'DELETE','route' => ['other.destroy',$post->id]]) !!}
                    <button type="submit"  class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                    <abbr title="{{$post->dateFormatted(true)}}"> {{$post->dateFormatted()}} </abbr>
                    {!! $post->publicationLabel() !!}
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
