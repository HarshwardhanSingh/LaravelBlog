<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Like;

class Post extends Model
{
    protected $fillable = ['title','content','slug','user_id'];

    protected $table = 'posts';

    public static $create_validation_rules = [
      'title'=>'required|unique:posts',
      'content'=>'required',
      'slug'=>'required|unique:posts'
    ];
    public static $update_validation_rules = [
      'title'=>'required',
      'content'=>'required',
      'slug'=>'required'
    ];
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function iflikes($id)
    {
      $like = Like::wherePostIdAndUserId($id,\Auth()->user()->id)->get();
      if(count($like))
      {
        return true;
      }
      else {
        return false;
      }

    }


}
