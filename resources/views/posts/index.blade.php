@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      @foreach($posts as $post)
        <div class="post panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-8">
                <h4>{{ $post->title }}</h4>
              </div>
              @if(\Auth::user())
                @if(\Auth::user()->id == $post->user_id)
                  <div class="col-xs-4">
                    {{ link_to_route('posts.edit',"Edit",array($post->id),array('class'=>'btn btn-info btn-sm','style'=>'text-align: right;margin-right:5px;')) }}
                    {!! Form::open(array('route' => array('posts.destroy',$post->id),'style'=>'display: inline-block;float: right;','method'=>'delete')) !!}
                      {!! Form::token() !!}
                      {!! Form::submit('Delete',array('class' => 'btn btn-danger btn-sm')) !!}
                    {!! Form::close() !!}
                  </div>
                @endif
              @endif
            </div>
          </div>
          <div class="panel-body">
            {{ $post->content }}
            <br/>
            <h5><b>Created By: </b>{{$post->user->name}}</h5>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
