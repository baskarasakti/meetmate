@extends('master.login')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
@endsection

@section('content')
<form action="{{url('pengaturan/'.md5($id).'/update')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="header-img">
	<div class="user-pic">
		<img src="{{URL::asset($foto)}}" id="blah">
		<div class="form-group fmgp">
		    <label for="imgInp" class="btn btn-primary">
		    	Pilih Foto
		    	<input type="file" class="form-control" id="imgInp" name="image">
		    </label>
		 </div>
		<!--span class="glyphicon glyphicon-heart icon-profile"></span>
		<span class="glyphicon glyphicon-user icon-profile"></span-->
		<a href="{{url('pengaturan')}}"><button class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</button></a>
	</div>
</div>
<div id="wrapper" class="profile">
	<div class="col-md-6">
			<table width="350px" class="edit">
				<tr>
					<td><p>Nama</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="name" class="form-control" placeholder="Nama Depan" value="{{$name}}">
	                        @if($errors->has('name'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Tanggal Lahir</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="tanggallahir" class="form-control" id="datepicker" placeholder="Tanggal Lahir" value="{{$age}}">
	                        @if($errors->has('tanggallahir'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
                    </td>
				</tr>
				<tr>
					<td><p>Etnis</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="etnis" class="form-control" placeholder="Etnis" value="{{$etnis}}">
	                        @if($errors->has('etnis'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Tinggi</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="tinggi" class="form-control" placeholder="Tinggi" value="{{$tinggi}}">
	                        @if($errors->has('tinggi'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Berat</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="berat" class="form-control" placeholder="berat" value="{{$berat}}">
	                        @if($errors->has('berat'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Tipe Badan</p>
					<td>
						<div class="input-group">
	                        <input type="text" name="tipe_badan" class="form-control" placeholder="Tipe Badan" value="{{$tipe_badan}}">
	                        @if($errors->has('tipe_badan'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Pendidikan</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="{{$pendidikan}}">
	                        @if($errors->has('pendidikan'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Status</p></td>
					<td>
						<div class="input-group">
	                        <select class="form-control" name="status">
	                            <option value="1" @if($status == 1) selected="selected" @endif>Sudah pernah menikah</option>
	                            <option value="2" @if($status == 2) selected="selected" @endif>Belum Menikah</option>
	                        </select>
	                        @if($errors->has('status'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Profesi</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="profesi" class="form-control" placeholder="Profesi" value="{{$profesi}}">
	                        @if($errors->has('profesi'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Penghasilan</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="penghasilan" class="form-control" placeholder="Penghasilan" value="{{$penghasilan}}">
	                        @if($errors->has('penghasilan'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
				<tr>
					<td><p>Hobi</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="hobi" class="form-control" placeholder="Hobi" value="{{$hobi}}">
	                        @if($errors->has('hobi'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
	                </td>
				</tr>
				<tr>
					<td><p>Bahasa</p></td>
					<td>
						<div class="input-group">
	                        <input type="text" name="bahasa" class="form-control" placeholder="Bahasa" value="{{$bahasa}}">
	                        @if($errors->has('bahasa'))
	                        <div class="input-group-btn">
	                            <button class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="color: red;"></span></button>
	                        </div>
	                        @endif
	                    </div>
					</td>
				</tr>
			</table>
	</div>
	<div class="col-md-6">
		<div class="profilebox">
			<h3>Tentang Saya</h3>
			<textarea style="height: 125px; resize: none;"class="form-control" name="tentang" value="{{$tentang}}"></textarea>
		</div>
		<div class="profilebox" style="margin-top: 20px;">
			<h3>Kriteria Saya</h3>
			<textarea style="height: 125px; resize: none;" class="form-control" name="kriteria" value="{{$kriteria}}"></textarea>
		</div>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="float: right; margin-top: 10px;">
	</div>
</div>
</form>
@endsection

@section('script')
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
	}

	$('#imgInp').change(function() {
		readURL(this);
	})
</script>
@endsection