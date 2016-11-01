@extends('master')

@section('header')
<header>
    <nav class="navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{URL::asset('img/icon/bantutemuin.png')}}" width="120" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/dashboard">Beranda</a></li>
                    <li><a href="{{url('kajian')}}">Kajian</a></li>
                    <li><a href="{{url('notifikasi')}}">Notifikasi <font color="red">{{count($notif)}}</font></a></li>
                    <li><a href="{{url('tentang')}}">Tentang Kami</a></li>
                    <li><a href="{{url('kontak')}}">Kontak Kami</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="username">Hai, {{explode(' ',trim($name))[0]}}</a></li>
                    <li><a href="{{url('search')}}"><span class="glyphicon glyphicon-search"></span></a></li>
                    <li><a href="{{url('pengaturan')}}">Pengaturan</a></li>
                    <li><a href="{{url('auth/logout')}}">Keluar</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
@endsection

@section('footer')
<div class="clearfix"></div>
<footer>
    <div id="wrapper">
        <div class="col-md-4">
            <h3>Kritik & Saran</h3>
            <p>Jika anda ingin menyampaikan
            saran/kritik terhadap sistem kami.
            Anda dapat menghubungi kami di:</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>  08570000000</p>
            <p><i class="fa fa-whatsapp" aria-hidden="true"></i>  08570000000</p>
        </div>
        <div class="col-md-8">
            <div class="footer-icon">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</footer>
@endsection