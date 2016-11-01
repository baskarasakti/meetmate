@extends('master.login')

@section('content')
<div class="header-img">
	<div class="user-pic">
		<img src="{{URL::asset($foto)}}">
		<!--span class="glyphicon glyphicon-heart icon-profile"></span>
		<span class="glyphicon glyphicon-user icon-profile"></span-->
		<a href="{{url('pengaturan/'.md5($id).'/edit')}}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profil</button></a>
	</div>
</div>
<div id="wrapper" class="profile">
	<div class="col-md-6">
		<h2>{{$name}}</h2>
		<table width="300px">
			<tr>
				<td><p>Usia</p></td>
				<td><p>: {{$age}}</p></td>
			</tr>
			<tr>
				<td><p>Etnis</p></td>
				<td><p>: {{$etnis}}</p></td>
			</tr>
			<tr>
				<td><p>Tinggi</p></td>
				<td><p>: {{$tinggi}}</p></td>
			</tr>
			<tr>
				<td><p>Berat</p></td>
				<td><p>: {{$berat}}</p></td>
			</tr>
			<tr>
				<td><p>Tipe Badan</p>
				<td><p>: {{$tipe_badan}}</p></td>
			</tr>
			<tr>
				<td><p>Pendidikan</p></td>
				<td><p>: {{$pendidikan}}</p></td>
			</tr>
			<tr>
				<td><p>Status</p></td>
				<td><p>: {{$status}}</p></td>
			</tr>
			<tr>
				<td><p>Profesi</p></td>
				<td><p>: {{$profesi}}</p></td>
			</tr>
			<tr>
				<td><p>Penghasilan</p></td>
				<td><p>: {{$penghasilan}}</p></td>
			</tr>
			<tr>
				<td><p>Hobi</p></td>
				<td><p>: {{$hobi}}</p></td>
			</tr>
			<tr>
				<td><p>Bahasa</p></td>
				<td><p>: {{$bahasa}}</p></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<div class="profilebox">
			<h3>Tentang Saya</h3>
			<p>{{$tentang}}</p>
		</div>
		<div class="profilebox" style="margin-top: 20px;">
			<h3>Kriteria Saya</h3>
			<p>{{$kriteria}}</p>
		</div>
	</div>
</div>
@endsection