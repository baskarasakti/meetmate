@extends('master.nologin')

@section('content')
<div class="jumbotron jb01">
	<div class="box-right">
		<p>Kamu ingin MENIKAH? Tapi belum nemu pasangan yang pas?</p>
		<br><br>
		<p>Daftar MeetMate aja. Disini kamu bisa cari pasangan sesuai kriteria yang kamu inginkan</p>
		<a href="{{url('auth/register')}}"><button class="btn btn-primary">Ayo Gabung</button></a>
	</div>
</div>
<div class="jumbotron jb02">
	<h3>Kenapa #MeetMate ?</h3>
	<p>Karena #MeetMate dibuat untuk membantu kamuterhubung dan menemukan pasangan sejati dalam kehidupanmu</p>
	<div class="border-gj"></div>
	<div class="col-md-4">
		<div class="circle"><i class="fa fa-heart" aria-hidden="true"></i></div>
		<h4>LOVE</h4>
		<p>Kamu dapat blbalalbalblablal</p>
	</div>
	<div class="col-md-4">
		<div class="circle"><i class="fa fa-user-md" aria-hidden="true"></i></div>
		<h4>PSYCHOLOGY</h4>
		<p>Kamu dapat blbalalbalblablal</p>
	</div>
	<div class="col-md-4">
		<div class="circle"><i class="fa fa-lock" aria-hidden="true"></i></div>
		<h4>SECURE</h4>
		<p>Kamu dapat blbalalbalblablal</p>
	</div>
</div>
<div class="jumbotron jb03">
	
</div>
@endsection