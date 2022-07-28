<?php

namespace App\Http\Controllers;
use App\Models\Seragam;

use Illuminate\Http\Request;

class SeragamController extends Controller
{
//Seragam
    public function index()
	{
    		// mengambil data dari table pegawai
		$seragam= Seragam::paginate(10);
 
    		// mengirim data seragam ke view index
		return view('seragam.seragam',compact('seragam'));
 
	}
//search seragam
	public function cariSeragam(Request $request)
	{
        if($request->search){

            $seragam = Seragam::where('ukuran','like','%'.$request->search.'%')->orWhere('jenis','like','%'.$request->search.'%')->orWhere('harga','like','%'.$request->search.'%')->get();
  
		return view('seragam.seragam',compact('seragam'));
        }else{

            $seragam = Seragam::all();
            return view('seragam.seragam',compact('seragam'));

        }


	}


//tanggal sort
    public function sortASCSerTgl(Request $request){
        
        $seragam = Seragam::orderBy('created_at','asc')->get();
        return view('seragam.seragam',compact('seragam'));

    }
    public function sortDESCSerTgl(Request $request){

         $seragam = Seragam::orderBy('created_at','desc')->get();
        return view('seragam.seragam',compact('seragam'));

    }

//ukuran sort
    public function sortASCSerUk(Request $request){
                   
        $seragam = Seragam::orderBy('ukuran','asc')->get();
        return view('seragam.seragam',compact('seragam'));

    }
    public function sortDESCSerUk(Request $request){

        $seragam = Seragam::orderBy('ukuran','desc')->get();
        return view('seragam.seragam',compact('seragam'));

    }

//jenis sort
    public function sortASCSerJen(Request $request){

        $seragam = Seragam::orderBy($input,'asc')->get();
        return view('seragam.seragam',compact('seragam'));
            
    }
    public function sortDESCSerJen(Request $request){

        $seragam = Seragam::orderBy('jenis','desc')->get();
        return view('seragam.seragam',compact('seragam'));

    }
    
//harga sort
    public function sortASCSerHar(Request $request){

        $seragam = Seragam::orderBy('harga','asc')->get();
        return view('seragam.seragam',compact('seragam'));

    }
    public function sortDESCSerHar(Request $request){

        $seragam = Seragam::orderBy('harga','desc')->get();
        return view('seragam.seragam',compact('seragam'));

    }
 
//filter seragam
    public function filter(Request $request){
      
        if($request->tanggal == 'asc'){
            $seragam = Seragam::orderBy('ukuran','asc')->get();
            return view('seragam.filter',compact('seragam'));
        }
    }

//filter ukuran
    public function filtUks(Request $request){
        if($request->uk_s == null){
            $request->uk_s = 's';
            $req = $request->uk_s;
    }
        $seragam = Seragam::where('ukuran','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
    public function filtUkm(Request $request){
        if($request->uk_m == null){
            $request->uk_m = 'm';
            $req = $request->uk_m;
    }
        $seragam = Seragam::where('ukuran','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
    public function filtUkl(Request $request){
        if($request->uk_l == null){
            $request->uk_l = 'l';
            $req = $request->uk_l;
    }
        $seragam = Seragam::where('ukuran','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
    public function filtUkxl(Request $request){
        if($request->uk_xl == null){
            $request->uk_xl = 'xl';
            $req = $request->uk_xl;
    }
        $seragam = Seragam::where('ukuran','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }

//filter jenis
    public function filtJENol(Request $request){
        if($request->jen_ol == null){
            $request->jen_ol = 'olahraga';
            $req = $request->jen_ol;
    }
        $seragam = Seragam::where('jenis','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
    public function filtJENbtk(Request $request){
        if($request->jen_btk == null){
            $request->jen_btk = 'batik';
            $req = $request->jen_btk;
    }
        $seragam = Seragam::where('jenis','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
    public function filtJENprmk(Request $request){
        if($request->jen_prmk == null){
            $request->jen_prmk = 'pramuka';
            $req = $request->jen_prmk;
    }
        $seragam = Seragam::where('jenis','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
    public function filtJENmslm(Request $request){
        if($request->jen_mslm == null){
            $request->jen_mslm = 'batik';
            $req = $request->jen_mslm;
    }
        $seragam = Seragam::where('jenis','like',$req)->get();
        return view('seragam.filter',compact('seragam'));
    }
//add seragam 
    public function postSeragam(Request $request) {
        $this->validate($request,[
            'ukuran' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
           
            

        ]);

        $seragam = new Seragam();
        $seragam-> ukuran = $request-> ukuran;
        $seragam-> jenis = $request->jenis;
        $seragam-> harga = $request-> harga;       
            // dd($seragam);
            $seragam-> save();
            return redirect()->back();
    }


//edit seragam
    public function putSeragam(Request $request,$id) {
        $seragam = Seragam::where('id',$id)->firstOrFail();

        $request->validate([
            'ukuran' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
         
        ]);
        // dd($request);
        
        $seragam->ukuran = $request->ukuran;
        $seragam->jenis = $request->jenis;
        $seragam->harga = $request->harga;

        // dd($data);
        $seragam->update();

        return redirect()->back();
    }

//delete seragam
    public function destroy($id){
    $data = Seragam::find($id);

    $data->delete();

    return redirect()->back();

    }
}
