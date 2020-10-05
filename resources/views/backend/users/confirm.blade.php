@extends('layouts.backend.main')

@section('title', 'MyBlog | Delete Confirmation')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blog
          <small>Delete confirmation</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('users.index') }}">Blog</a></li>
          <li class="active">Delete</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body ">
                {!! Form::model($user, [
                        'method' => 'DELETE',
                        'route'  => ['users.destroy',$user->id],
                        'id'     => 'user-form'
                    ]) !!}

                        <!-- @include('backend.users.form') -->
                    <div class="col-xs-9">
                      <div class="box">
                        <div class="box-body">
                          <p>You have specified this user for deletion:</p>
                          <p>ID #{{$user->id}}: {{$user->name}}</p>
                          <p>What should be done with content of this user?</p>
                          <p> <input type="radio" name="deletion_option" value="delete" checked> Delete all content </p>
                          <p> <input type="radio" name="deletion_option" value="attribute"> Attribute content to: 
                              {!! Form::select('selected_user', $users,null) !!}
                          </p>

                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                          <a href="{{route('users.index')}}" class="btn btn-default">Cancel</a>
                        </div>
                      </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection


@include('backend.users.script')