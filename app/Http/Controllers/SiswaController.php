<?php

namespace App\Http\Controllers;
use App\Models\Siswa;


use Illuminate\Http\Request;

class SiswaController extends Controller
{
//Siswa
    public function index()
	{
    		// mengambil data dari table pegawai
		$siswa = Siswa::all();
 
    		// mengirim data siswa ke view index
		return view('siswa.siswa',compact('siswa'));
 
	}

//cari siswa
	public function cariSiswa(Request $request)
	{
        if($request->search){

            $siswa = Siswa::where('nama','like','%'.$request->search.'%')->orWhere('kelas','like','%'.$request->search.'%')->orWhere('nisn','like','%'.$request->search.'%')->orWhere('absen','like','%'.$request->search.'%')->get();
  
		return view('siswa.siswa',compact('siswa'));
        }else{

            $siswa = Siswa::all();
            return view('siswa.siswa',compact('siswa'));

        }
	}

//Tanggal sort
    public function sortASCSisTgl(Request $request){
            
        $siswa = Siswa::orderBy('created_at','asc')->get();
        return view('siswa.siswa',compact('siswa'));

    }
    public function sortDESCSisTgl(Request $request){

        $siswa = Siswa::orderBy('created_at','desc')->get();
        return view('siswa.siswa',compact('siswa'));

    }

//Nama sort
    public function sortASCSisNm(Request $request){
                
        $siswa = Siswa::orderBy('nama','asc')->get();
        return view('siswa.siswa',compact('siswa'));

    }
    public function sortDESCSisNm(Request $request){

        $siswa = Siswa::orderBy('nama','desc')->get();
        return view('siswa.siswa',compact('siswa'));

    }

//Kelas sort
    public function sortASCSisKls(Request $request){
                    
        $siswa = Siswa::orderBy('kelas','asc')->get();
        return view('siswa.siswa',compact('siswa'));

    }
    public function sortDESCSisKls(Request $request){

        $siswa = Siswa::orderBy('kelas','desc')->get();
        return view('siswa.siswa',compact('siswa'));

    }

//Nisn sort
    public function sortASCSisNisn(Request $request){
                        
        $siswa = Siswa::orderBy('nisn','asc')->get();
        return view('siswa.siswa',compact('siswa'));

    }
    public function sortDESCSisNisn(Request $request){

        $siswa = Siswa::orderBy('nisn','desc')->get();
        return view('siswa.siswa',compact('siswa'));

    }

//Absen sort
    public function sortASCSisAbs(Request $request){
                            
        $siswa = Siswa::orderBy('absen','asc')->get();
        return view('siswa.siswa',compact('siswa'));

    }
    public function sortDESCSisAbs(Request $request){

        $siswa = Siswa::orderBy('absen','desc')->get();
        return view('siswa.siswa',compact('siswa'));

    }

//Filter kelas
public function filtKlsSplh(Request $request){
    if($request->kls_10 == null){
        $request->kls_10 = '10';
        $req = $request->kls_10;
}
    $siswa = Siswa::where('kelas','like',$req)->get();
    return view('siswa.filter',compact('siswa'));
}
public function filtKlsSbls(Request $request){
    if($request->kls_11 == null){
        $request->kls_11 = 'l';
        $req = $request->kls_11;
}
    $siswa = Siswa::where('kelas','like',$req)->get();
    return view('siswa.filter',compact('siswa'));
}
public function filtKlsDbls(Request $request){
    if($request->uk_12 == null){
        $request->uk_12 = '12';
        $req = $request->uk_12;
}
    $siswa = Siswa::where('kelas','like',$req)->get();
    return view('siswa.filter',compact('siswa'));
}

//tambah siswa
    public function postSis(Request $request) {
        $this->validate($request,[
            'nama' => 'required',
            'kelas' => 'required',
            'nisn' => 'required',
            'absen' => 'required',           
            

        ]);

        $siswa = new Siswa();
        $siswa-> nama = $request->nama;
        $siswa-> kelas = $request->kelas;
        $siswa-> nisn = $request->nisn;   
        $siswa-> absen = $request->absen;    
            // dd($siswa);
            $siswa->save();
            return redirect()->back();
    }

//edit siswa
    public function putSiswa(Request $request, $id)
    {
        $siswa = Siswa::where('id',$id)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'nisn' => 'required',
            'absen' => 'required', 

        ]);
        
        $siswa-> nama = $request->nama;
        $siswa-> kelas = $request->kelas;
        $siswa-> nisn = $request->nisn;   
        $siswa-> absen = $request->absen;  

        // dd($siswa);
        $siswa->update();

        return redirect()->back();
    }

//delete siswa
    public function destroy($id)
    {
    $data = Siswa::find($id);

    $data->delete();

    return redirect()->back();
    }
}
