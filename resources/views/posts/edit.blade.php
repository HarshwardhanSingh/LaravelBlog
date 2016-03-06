@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      @if($errors->count())
				<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			@endif
      {!! Form::model($post,array('route' => array('posts.update',$post->id),'method'=>'put')) !!}
        <div class="form-group">
          {!! Form::label('title') !!}
          {!! Form::text('title',null,array('class'=>'form-control','placeholder'=> 'Post Title')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('content') !!}
          {!! Form::textarea('content',null,array('class'=>'form-control','placeholder'=> 'Post Content')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('slug') !!}
          {!! Form::text('slug',null,array('class'=>'form-control','placeholder'=> 'Post Slug')) !!}
        </div>
        <div class="form-group">
          {!! Form::token() !!}
          {!! Form::submit('Update',array('class'=>'btn btn-primary')) !!}
        </div>
      {!! Form::close() !!}


@endsection
