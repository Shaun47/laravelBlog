@extends('layouts.backend.main')

@section('title','MyBlog | BlogIndex')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display all posts </small>
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
                  <a href="{{route('other.create')}}" class="btn btn-success">Add New</a>
                </div>

                <div class="pull-right">
                  <?php $links = [] ?>
                    @foreach($statusList as $key => $value)
                        @if($value)
                            <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                            <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                        @endif
                    @endforeach
                    {!! implode(' | ', $links) !!}
                </div>

              </div>

              <!-- /.box-header -->
              <div class="box-body ">
                @include('backend.blog.message')
                @if($postCount == 0)
                <div class="alert alert-danger">
                  <strong>No record found</strong>
                </div>
                @else
                  @if($onlyTrashed)
                    @include('backend.blog.table-trash')
                  @else
                    @include('backend.blog.table')
                  @endif
                @endif
                <nav>
                  {{$posts->appends(Request::query())->render()}}
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
