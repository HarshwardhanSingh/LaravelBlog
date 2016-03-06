<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','slug'];

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


}
