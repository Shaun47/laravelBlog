<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td width="120">Category Name</td>
            <td width="150">Number of Posts</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)

            <tr>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy',$category->id]]) !!}
                    <button type="submit"  class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->posts->count() }}</td>
               
            </tr>

        @endforeach
    </tbody>
</table>
