<?php

namespace App\Http\Controllers;

use App\User;
use App\User_bio;
use App\Status;
use App\Notifikasi;
use Illuminate\Http\Request;

class bioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        function agecalc($value)
        {
            //date in mm/dd/yyyy format; or it can be in other formats as well
            $birthDate = $value;
            //explode the date to get month, day and year
            $birthDate = explode("-", $birthDate);
            //get age from date or birthdate
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
            return $age;
        }

        $notif = Notifikasi::where('untuk', '=', \Auth::user()->id)->get();
        $name = \Auth::user()->name;
    	$id = \Auth::user()->id;
        $user = User_bio::where('id_user', '=', \Auth::user()->id)->first();
        $status = Status::where('id_status', '=', $user->id_status)->first();

        $age = agecalc($user->tanggal_lahir);
        $etnis = $user->etnis;
        $tinggi = $user->tinggi;
        $berat = $user->berat;
        $tipe_badan = $user->tipe_badan;
        $pendidikan = $user->pendidikan;
        $status = $status->status;
        $profesi = $user->profesi;
        $penghasilan = $user->penghasilan;
        $hobi = $user->hobi;
        $bahasa = $user->bahasa;
        $tentang = $user->tentang;
        $kriteria = $user->kriteria;
        $foto = $user->foto;

    	return view('login.profile')
            ->with('id', $id)
            ->with('notif', $notif)
            ->with('name', $name)
            ->with('age', $age)
            ->with('etnis', $etnis)
            ->with('tinggi', $tinggi)
            ->with('berat', $berat)
            ->with('tipe_badan', $tipe_badan)
            ->with('pendidikan', $pendidikan)
            ->with('status', $status)
            ->with('profesi', $profesi)
            ->with('penghasilan', $penghasilan)
            ->with('hobi', $hobi)
            ->with('bahasa', $bahasa)
            ->with('tentang', $tentang)
            ->with('kriteria', $kriteria)
    		->with('foto', $foto);
    }

    public function edit()
    {
        $name = \Auth::user()->name;
        $id = \Auth::user()->id;
        $user = User_bio::where('id_user', '=', \Auth::user()->id)->first();
        $status = Status::where('id_status', '=', $user->id_status)->first();

        $notif = Notifikasi::where('untuk', '=', \Auth::user()->id)->get();
        $age = $user->tanggal_lahir;
        $etnis = $user->etnis;
        $tinggi = $user->tinggi;
        $berat = $user->berat;
        $tipe_badan = $user->tipe_badan;
        $pendidikan = $user->pendidikan;
        $status = $status->id_status;
        $profesi = $user->profesi;
        $penghasilan = $user->penghasilan;
        $hobi = $user->hobi;
        $bahasa = $user->bahasa;
        $tentang = $user->tentang;
        $kriteria = $user->kriteria;
        $foto = $user->foto;

        return view('login.profileedit')
            ->with('id', $id)
            ->with('notif', $notif)
            ->with('name', $name)
            ->with('age', $age)
            ->with('etnis', $etnis)
            ->with('tinggi', $tinggi)
            ->with('berat', $berat)
            ->with('tipe_badan', $tipe_badan)
            ->with('pendidikan', $pendidikan)
            ->with('status', $status)
            ->with('profesi', $profesi)
            ->with('penghasilan', $penghasilan)
            ->with('hobi', $hobi)
            ->with('bahasa', $bahasa)
            ->with('tentang', $tentang)
            ->with('kriteria', $kriteria)
            ->with('foto', $foto);
    }

    public function update(Request $request)
    {
        $user = User::where('id', '=', \Auth::user()->id)->first();
        $user_bio = User_bio::where('id_user', '=', \Auth::user()->id)->first();

        $user->name = $request->input('name');
        $user->save();

        $user_bio->nama = $request->input('name');
        $user_bio->etnis = $request->input('etnis');
        $user_bio->tinggi = $request->input('tinggi');
        $user_bio->berat = $request->input('berat');
        $user_bio->tipe_badan = $request->input('tipe_badan');
        $user_bio->pendidikan = $request->input('pendidikan');
        $user_bio->id_status = $request->input('status');
        $user_bio->profesi = $request->input('profesi');
        $user_bio->penghasilan = $request->input('penghasilan');
        $user_bio->hobi = $request->input('hobi');
        $user_bio->bahasa = $request->input('bahasa');
        $user_bio->tentang = $request->input('tentang');
        $user_bio->kriteria = $request->input('kriteria');
        if ($request->hasFile('image')) {
            //image upload
            $filename = "./res/img/usr_pic/".sha1(uniqid(mt_rand(),TRUE)).".png";
            $user_bio->foto = $filename;

            $image = \Input::file('image');
            $image1 = $image->move(public_path().'/res/img/usr_pic', $user_bio->foto);
            //image upload end
        }
        $user_bio->save();

        return redirect('pengaturan');
    }

    public function profile($id)
    {
        function agecalc($value)
        {
            //date in mm/dd/yyyy format; or it can be in other formats as well
            $birthDate = $value;
            //explode the date to get month, day and year
            $birthDate = explode("-", $birthDate);
            //get age from date or birthdate
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
            return $age;
        }

        $notif = Notifikasi::where('untuk', '=', \Auth::user()->id)->get();
        $name = \Auth::user()->name;
        $id = openssl_decrypt(base64_decode($id),'AES-256-CBC',hash('sha256', 'meet'),0,substr(hash('sha256', 'mate'), 0, 16));
        $user = User_bio::where('id_user', '=', $id)->first();
        $status = Status::where('id_status', '=', $user->id_status)->first();
        $liked = User_bio::join('notifikasi','notifikasi.untuk','=','user_bios.id_user')
            ->where('notifikasi.dari', '=', \Auth::user()->id)
            ->where('notifikasi.untuk', '=', $id)
            ->first();

        $nama = $user->nama;
        $age = agecalc($user->tanggal_lahir);
        $etnis = $user->etnis;
        $tinggi = $user->tinggi;
        $berat = $user->berat;
        $tipe_badan = $user->tipe_badan;
        $pendidikan = $user->pendidikan;
        $status = $status->status;
        $profesi = $user->profesi;
        $penghasilan = $user->penghasilan;
        $hobi = $user->hobi;
        $bahasa = $user->bahasa;
        $tentang = $user->tentang;
        $kriteria = $user->kriteria;
        $foto = $user->foto;

        return view('login.profileview')
            ->with('id', $id)
            ->with('notif', $notif)
            ->with('name', $name)
            ->with('liked', $liked)
            ->with('nama', $nama)
            ->with('age', $age)
            ->with('etnis', $etnis)
            ->with('tinggi', $tinggi)
            ->with('berat', $berat)
            ->with('tipe_badan', $tipe_badan)
            ->with('pendidikan', $pendidikan)
            ->with('status', $status)
            ->with('profesi', $profesi)
            ->with('penghasilan', $penghasilan)
            ->with('hobi', $hobi)
            ->with('bahasa', $bahasa)
            ->with('tentang', $tentang)
            ->with('kriteria', $kriteria)
            ->with('foto', $foto);
    }

    public function like($id)
    {
        $id = openssl_decrypt(base64_decode($id),'AES-256-CBC',hash('sha256', 'meet'),0,substr(hash('sha256', 'mate'), 0, 16));
        $notif = new Notifikasi;
        $notif->dari = \Auth::user()->id;
        $notif->untuk = $id;
        $notif->save();

        return redirect()->back();
    }
}