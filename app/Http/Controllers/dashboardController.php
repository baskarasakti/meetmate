<?php

namespace App\Http\Controllers;

use App\User;
use App\User_bio;
use App\Status;
use App\Kota;
use App\Notifikasi;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$nama = $request->nama;
    	$name = \Auth::user()->name;
    	$notif = Notifikasi::where('untuk', '=', \Auth::user()->id)->get();
    	$user_gender = User_bio::join('users', 'users.id', '=', 'user_bios.id_user')
    		->where('id_user', '=', \Auth::user()->id)
    		->first();
    	$user = User_bio::join('kota', 'user_bios.id_kota', '=', 'kota.id_kota')
    		->where('id_user', '!=', \Auth::user()->id)
    		->where('gender', '!=', $user_gender->gender)
    		->paginate(12);
    	if ($nama) {
    		$user = User_bio::join('kota', 'user_bios.id_kota', '=', 'kota.id_kota')
    			->where('id_user', '!=', \Auth::user()->id)
    			->where('gender', '!=', $user_gender->gender)
    			->where('nama', 'LIKE', "%".$nama."%")
    			->paginate(12);
    	}

    	return view('login.dashboard')
            ->with('user', $user)
            ->with('name', $name)
            ->with('notif', $notif);
    }
}