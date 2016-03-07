@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="post_form">
        <h3>Create Post</h3>
        <hr/>
        @if($errors->count())
  				<ul class="alert alert-danger">
  				@foreach($errors->all() as $error)
  					<li>{{ $error }}</li>
  				@endforeach
  				</ul>
  			@endif
        {!! Form::open(array('route' => 'posts.store')) !!}
          <div class="form-group">
            {!! Form::label('title') !!}
            {!! Form::text('title',null,array('class'=>'form-control','placeholder'=> 'Post Title')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('content') !!}
            {!! Form::textarea('content',null,array('class'=>'form-control','placeholder'=> 'Post Content','rows'=>'5')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('slug') !!}
            {!! Form::text('slug',null,array('class'=>'form-control','placeholder'=> 'Post Slug')) !!}
          </div>
          <div class="form-group">
            {!! Form::token() !!}
            {!! Form::submit('Create',array('class'=>'btn btn-primary')) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>


@endsection
