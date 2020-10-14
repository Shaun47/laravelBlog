<table class="table table-bordered">
    <thead>
        <tr>
            <td>Action</td>
            <td>user Name</td>
            <td>Email</td>
            <td >Role</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)

            <tr>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',$user->id]]) !!} -->
                    @if ($user->id == config('cms.default_user_id'))
                        <a href="{{ route('users.confirm', $user->id) }}" type="submit"  class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-times"></i>
                        </a>
                    @else
                        <a href="{{ route('users.confirm', $user->id) }}" type="submit"  class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i>
                        </a>
                    @endif
                    
                    <!-- {!! Form::close() !!} -->
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->first()->display_name }}</td>
               
            </tr>

        @endforeach
    </tbody>
</table>
