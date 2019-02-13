<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
    public function index(){
      return view('admin/profile', [
        'user' => Auth::user() //Auth keeps user data in Yaf_Session
      ]);
    }

    public function settings(){
      $query = DB::table('configurations')->where('id', 1);
      $maintenance = $query->first();
      $value = $maintenance->value;
      return view('admin/settings',[
        'value' => $value
      ]);
    }

    public function setsettings(Request $request){

      $input = $request->all();
      $maintenance = $request->input('maintenance');

      //if maintenance is not null, update to on
      if ($maintenance){
        DB::table('configurations')
          ->where('name', 'maintenance')
          ->update(['value'=>'on']);
      }else{
        DB::table('configurations')
          ->where('name', 'maintenance')
          ->update(['value'=>'off']);
      }

      //redirect to /playlists
      return redirect('/profile');
    }

    public function maintenance(){
      return view('/maintenance');
    }
}
