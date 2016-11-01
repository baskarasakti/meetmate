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
            <p style="color: red;"><strong>Email atau Password anda salah</strong></p>
            @else
            <p>Masukkan akun anda</p>
            @endif
            <form action="{{url('auth/login')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                    @if($errors->has('password'))
                    <div class="input-group-btn">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
                    </div>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            <a href="{{url('auth/register')}}">Belum punya akun</a>
        </div>
    </div>
</body>
</html>