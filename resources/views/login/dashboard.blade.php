@extends('master.login')

@section('css')
<link rel="stylesheet" type="text/css" href="{{URL::asset('res/captionhover/css/component.css')}}" />
<script src="{{URL::asset('res/captionhover/js/modernizr.custom.js')}}"></script>
<script src="{{URL::asset('res/masonry/imagesloaded.js')}}"></script>
<script src="{{URL::asset('res/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<div id="wrapper">
	<section id="dashboard">
		<div class="search">
			<form name="myform" action="{{url('dashboard')}}" method="get">
				<div class="input-group input-group-lg dashboard-inputgrp">
				  	<input type="text" class="form-control" placeholder="Cari" aria-describedby="sizing-addon1" name="nama">
				  	<span class="input-group-addon glyphicon glyphicon-search dashboard-search-addon" id="sizing-addon1" onclick="myform.submit()"></span>
				</div>
			</form>
		</div>
		<div class="results">
			<div class="grid cs-style-3">
				@foreach($user as $usr)
					<figure class="grid-item">
						<img src="{{URL::asset($usr->foto)}}" alt="img04">
						<figcaption>
							<h3>{{$usr->nama}}</h3>
							<ul>
								<li><span>Kota : {{$usr->kota}}</span></li>
								<li><span>Pekerjaan : {{$usr->profesi}}</span></li>
								<li><span>Tinggi : {{$usr->tinggi}}</span></li>
								<li><span>Berat : {{$usr->berat}}</span></li>
							</ul>
							<a href="{{url('profile/'.base64_encode(openssl_encrypt($usr->id_user,'AES-256-CBC',hash('sha256', 'meet'),0,substr(hash('sha256', 'mate'), 0, 16))))}}"><button class="btn btn-primary" style="float: right;">Lihat Profil</button></a>
						</figcaption>
					</figure>
				@endforeach
			</div>
			{!! $user->render() !!}
		</div>
	</section>
</div>
@endsection

@section('script')
<script>
$('.results').imagesLoaded( function() {
  	$('.grid').masonry({
  		// options
  		itemSelector: '.grid-item',
  		columnWidth: 300
	});
});
</script>
@endsection