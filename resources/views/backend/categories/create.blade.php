@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new category')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blog
          <small>Add new category</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('categories.index') }}">Blog</a></li>
          <li class="active">Add new</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body ">
                {!! Form::model($category, [
                        'method' => 'POST',
                        'route'  => 'categories.store',
                        'files'  => TRUE,
                        'id'     => 'category-form'
                    ]) !!}

                        @include('backend.categories.form')

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


@include('backend.categories.script')