<?php

namespace App\Http\Controllers;

use App\User;
use App\User_bio;
use App\Status;
use App\Kota;
use App\Notifikasi;
use Illuminate\Http\Request;

class notifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$name = \Auth::user()->name;
        $notif = Notifikasi::where('untuk', '=', \Auth::user()->id)->get();
    	$user_gender = User_bio::join('users', 'users.id', '=', 'user_bios.id_user')
    		->where('id_user', '=', \Auth::user()->id)
    		->first();
    	$user = User_bio::join('notifikasi', 'user_bios.id_user', '=', 'notifikasi.untuk')
    		->where('notifikasi.untuk', '=', \Auth::user()->id)
    		->paginate(4);

    	return view('login.notif')
            ->with('user', $user)
            ->with('name', $name)
            ->with('notif', $notif);
    }
}