@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      @foreach($posts as $post)
        <div class="post panel panel-default">
          <div class="panel-heading">
            <h4>{{ $post->title }}</h4>
            {{ link_to_route('posts.edit',"Edit",array($post->id),array('style'=>'float:right;')) }}
          </div>
          <div class="panel-body">
            {{ $post->content }}
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
