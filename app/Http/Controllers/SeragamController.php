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
        $data = (object)[
            "sortBy" => "created_at",
            "sortType" => "asc",
            "search" => "",
            "ukuran_seragam" => "All",
            "jenis_seragam" => "All"
        ];
 
    		// mengirim data seragam ke view index
		return view('seragam.seragam',compact('seragam', 'data'));
 
	}

    public function operation(Request $request){
        $sortBy = $request->sortBy ? $request->sortBy : "asc";
        $sortType = $request->sortType ? $request->sortType : "created_at";
        $search = $request->search ? $request->search : "";
        $ukuran_seragam = $request->ukuran_seragam ? $request->ukuran_seragam : "All";
        $jenis_seragam = $request->jenis_seragam ? $request->jenis_seragam : "All";

        $data = (object)[
            "sortBy" => $sortBy,
            "sortType" => $sortType,
            "search" => $search,
            "ukuran_seragam" => $ukuran_seragam,
            "jenis_seragam" => $jenis_seragam
        ];

        if($jenis_seragam === "All" && $ukuran_seragam === "All"){
            $filter = Seragam::where('ukuran','like','%'.$search.'%')
                    ->orWhere('jenis','like','%'.$search.'%')
                    ->orWhere('harga','like','%'.$search.'%')
                    ->orderBy($sortBy,$sortType)
                    ->get();
        }
        else if($jenis_seragam === "All" || $ukuran_seragam !== "All"){
            $filter = Seragam::where('ukuran',$ukuran_seragam)
                    ->orderBy($sortBy,$sortType)
                    ->get();
        }
        else if($jenis_seragam !== "All" || $ukuran_seragam === "All"){
            $filter = Seragam::where('jenis',$jenis_seragam)
                    ->orderBy($sortBy,$sortType)
                    ->get();
        }
        else{
            $filter = Seragam::where('jenis',$jenis_seragam)
                    ->where('ukuran',$ukuran_seragam)
                    ->orderBy($sortBy,$sortType)
                    ->get();
        }

        foreach($filter as $key => $fil){
            if(!str_contains($fil->jenis, $search) && !str_contains($fil->ukuran, $search && !str_contains($fil->harga, $search))){
                unset($filter[$key]);
            }
        }

        $seragam = $filter->values();

        // dd($data, $seragam);
    
        return view('seragam.seragam',compact('seragam', 'data'));
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
