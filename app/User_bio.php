<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User_bio extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'user_bios';

    protected $primaryKey = 'id';

    protected $fillable = ['id_user','nama', 'id_tempat_lahir', 'tanggal_lahir', 'gender', 'id_status', 'nohp', 'alamat', 'ktp', 'ktp_wali', 'foto', 'kk', 'bukti', 'trasfer'];

    public static $rules = ['id_user'=>'required','nama'=>'required', 'id_tempat_lahir'=>'required', 'tanggal_lahir'=>'required', 'gender'=>'required', 'id_status'=>'required', 'nohp'=>'required', 'alamat'=>'required', 'ktp', 'ktp_wali', 'foto'=>'required', 'kk', 'bukti', 'trasfer'=>'required'];
}
