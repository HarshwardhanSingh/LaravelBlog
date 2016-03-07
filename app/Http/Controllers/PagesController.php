<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function welcome()
    {
      if(\Auth::user())
      {
        return redirect()->route('posts.index');
      }
      else
      {
        return view('pages.welcome');
      }
    }
}
