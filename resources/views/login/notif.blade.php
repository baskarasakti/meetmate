@extends('master.login')

@section('css')
<link rel="stylesheet" type="text/css" href="{{URL::asset('res/captionhover/css/component.css')}}" />
<script src="{{URL::asset('res/captionhover/js/modernizr.custom.js')}}"></script>
<script src="{{URL::asset('res/masonry/imagesloaded.js')}}"></script>
<script src="{{URL::asset('res/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<div id="wrapper">
	<section id="notif">
		@if(count($user)<1)
			<h1 style="height: 200px; text-align: center; vertical-align: middle;">Tidak ada Notifikasi</h1>
		@endif
		<div class="col-md-3">
			<div class="grid">
				@foreach($user as $usr)
					<figure class="grid-item">
						<img src="{{URL::asset($usr->foto)}}" alt="img04">
					</figure>
				@endforeach
			</div>
			{!! $user->render() !!}
		</div>
		<div class="col-md-9">
			@foreach($user as $usr)
			<div class="box">
				<div class="box-item">
					<h2>{{$usr->nama}} menyukai anda</h2>
					<p>Kota : {{$usr->kota}}</p>
					<p>Pekerjaan : {{$usr->profesi}}</p>
					<p>Tinggi : {{$usr->tinggi}}</p>
					<p>Berat : {{$usr->berat}}</p>
					<a href="{{url('profile/'.base64_encode(openssl_encrypt($usr->id_user,'AES-256-CBC',hash('sha256', 'meet'),0,substr(hash('sha256', 'mate'), 0, 16))))}}"><button class="btn btn-primary">Lihat Profil</button></a>
				</div>
			</div>
			@endforeach
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