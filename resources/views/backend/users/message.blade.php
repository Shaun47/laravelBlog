@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@elseif(session('error-message'))
<div class="alert alert-danger">
    {{ session('error-message') }}
</div>
@elseif(session('trash-message'))
    <div class="alert alert-info">
        

        <?php list($message,$postId) = session('trash-message'); ?>
        {{ $message  }}
        {!! Form::open(['method' => 'PUT', 'route' => ['other.restore',$postId]]) !!}

            <button type="submit" class="btn btn-primary"><i class="fa fa-undo"></i> Undo</button>
        {!! Form::close() !!}

    </div>
@endif