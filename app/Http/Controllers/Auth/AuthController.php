<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\User_bio;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'namabelakang' => 'required|max:255',
            'id_tempat_lahir' => 'required|max:255',
            'id_kota' => 'required|max:255',
            'tanggallahir' => 'required|max:255',
            'gender' => 'required|max:255',
            'status' => 'required|max:255',
            'nohp' => 'required|max:255',
            'tempattinggal' => 'required|max:255',
            'profesi' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        return User_bio::create([
            'id_user' => $user->id,
            'nama' => $data['name']." ".$data['namabelakang'],
            'id_tempat_lahir' => $data['id_tempat_lahir'],
            'id_kota' => $data['id_kota'],
            'tanggal_lahir' => $data['tanggallahir'],
            'gender' => $data['gender'],
            'id_status' => $data['status'],
            'nohp' => $data['nohp'],
            'alamat' => $data['tempattinggal'],
            'profesi' => $data['profesi'],
            'foto' => "asd",
            'transfer' => 0,
        ]);
    }
}
