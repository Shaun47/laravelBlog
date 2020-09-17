@extends('layouts.backend.main')

@section('title','MyBlog | CategoryIndex')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
        <small>Display all categories </small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <div class="pull-left">
                  <a href="{{route('categories.create')}}" class="btn btn-success">Add New</a>
                </div>

                <div class="pull-right">
                  
                </div>

              </div>

              <!-- /.box-header -->
              <div class="box-body ">
                @include('backend.categories.message')
                @if($categoriesCount == 0)
                <div class="alert alert-danger">
                  <strong>No record found</strong>
                </div>
                @else
                  
                    @include('backend.categories.table')
                  
                @endif
                <nav>
                  {{$categories->appends(Request::query())->render()}}
                </nav>

                   
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
