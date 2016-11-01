<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model 
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'kota';

    protected $primaryKey = 'id_kota';
}
