<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MeetMate | @yield('title')</title>

    <!-- Bootstrap and Master -->
    <link href="{{URL::asset('res/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('res/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('res/css/login.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
        });
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <div class="box">
            @if(count($errors) > 0)
                <p style="color: red;"><strong>Ketentuan Harus diisi</strong></p>
            @else
            <p>Masukkan identitas anda</p>
            @endif
            <form action="{{url('auth/register')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-6 left">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Nama Depan" value="{{old('name')}}">
                        @if($errors->has('name'))
                        <div class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-group">
                        <input type="text" name="namabelakang" class="form-control" placeholder="Nama Belakang">
                        @if($errors->has('namabelakang'))
                        <div class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" name="email" class="form-control" placeholder="Alamat Email">
                    @if($errors->has('email'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @if($errors->has('password'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ketik Ulang Password">
                    @if($errors->has('password'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="col-md-6 left">
                    <div class="input-group">
                        <select class="form-control" name="id_tempat_lahir">
                            <option value="" selected disabled>Kota Kelahiran</option>
                            <option value="1">Surabaya</option>
                            <option value="1">Bandung</option>
                        </select>
                        @if($errors->has('id_tempat_lahir'))
                        <div class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-group">
                        <input type="text" name="tanggallahir" class="form-control" id="datepicker" placeholder="Tanggal Lahir">
                        @if($errors->has('tanggallahir'))
                        <div class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 left">
                    <div class="input-group">
                        <select class="form-control" name="gender">
                            <option value="" selected disabled>Gender</option>
                            <option value="M">Laki-laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                        @if($errors->has('gender'))
                        <div class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-group">
                        <select class="form-control" name="status">
                            <option value="" selected disabled>Status</option>
                            <option value="1">Sudah pernah menikah</option>
                            <option value="2">Belum Menikah</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" name="nohp" class="form-control" placeholder="Nomor Handphone">
                    @if($errors->has('nohp'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="input-group">
                    <input type="text" name="tempattinggal" class="form-control" placeholder="Tempat Tinggal">
                    @if($errors->has('tempattinggal'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="input-group">
                    <select class="form-control" name="id_kota">
                        <option value="" selected disabled>Kota</option>
                        <option value="1">Surabaya</option>
                        <option value="2">Bandung</option>
                    </select>
                    @if($errors->has('id_kota'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="input-group">
                    <input type="text" name="profesi" class="form-control" placeholder="Profesi">
                    @if($errors->has('profesi'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            <a href="{{url('auth/login')}}">Sudah punya akun</a>
        </div>
    </div>
</body>
</html>