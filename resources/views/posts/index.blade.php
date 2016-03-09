@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      @if(count($posts)>0)
        @foreach($posts as $post)
          <div class="post">
            <div class="post-header">
                <h4>{{ $post->title }}</h4>
                <div class="timestamp">
                  {{$post->user->name}} {{ $post->created_at->diffforHumans()}}
                </div>
                <div class="action-btns">
                  @if(\Auth::user())
                    @if(\Auth::user()->id == $post->user_id)
                      {{ link_to_route('posts.edit',"Edit",array($post->id),array('class'=>'btn btn-info btn-sm','style'=>'text-align: right;margin-right:5px;')) }}
                      {!! Form::open(array('route' => array('posts.destroy',$post->id),'style'=>'display: inline-block;float: right;','method'=>'delete')) !!}
                        {!! Form::token() !!}
                        {!! Form::submit('Delete',array('class' => 'btn btn-danger btn-sm')) !!}
                      {!! Form::close() !!}
                    @endif
                  @endif
                </div>
            </div>
            <div class="post-body">
              {{ $post->content }}
              <br/>
              @if($post->iflikes($post->id))
                {{ link_to_route('unlike','UnLike',array($post->id),array('class' => 'btn btn-danger btn-sm unlike-btn')) }}
              @else
                {{ link_to_route('like','Like',array($post->id),array('class' => 'btn btn-success btn-sm like-btn')) }}
              @endif
            </div>
          </div>
        @endforeach
      @else
        <div class="empty">
          Nothing To Show Here!!
          <br/>
          {{ link_to_route('posts.create','Click here')}} to create post.
        </div>
      @endif
    </div>
  </div>

@endsection
