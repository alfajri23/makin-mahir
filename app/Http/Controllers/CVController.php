<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\CVSkil;
use App\Models\CVKerja;
use App\Models\CVEdukasi;
use App\Models\CVPortofolio;
use App\Models\CVPrestasi;
use App\Models\CVTraining;
use App\Models\CVOrganisasi;
use App\Models\CVTema;
use App\Models\CVUser;
use App\Models\User;
use PDF;

use Illuminate\Http\Request;

class CVController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','print','printPublicCV']);
    }

    public function checkIndex($request,$index){
        
        if(count($request)>0){
            if($request[0][$index] != null){        //Jika input kosong
                if($request[1][$index] == null){    //jika index ke-1 kosong,maka ambil index 0 saja
                    array_pop($request);
                    return $request;

                }else{
                    return $request;                //jika full
                }
            }else{
                return [];
            }
        }else{
            return $request; 
        }
    }

    public function printPublicCV(Request $request){
        //dd($request['edukasi']);
        //$kerja = $request['kerja'][0]['posisi'] != null ? $request['kerja'] : [];
        $kerja = $this->checkIndex($request['kerja'],'posisi');
        $skil = $this->checkIndex($request['skil'],'skil');
        $edukasi = $this->checkIndex($request['edukasi'],'sekolah');
        $prestasi = $this->checkIndex($request['prestasi'],'prestasi');
        $training = $this->checkIndex($request['training'],'program');
        $organisasi = $this->checkIndex($request['organisasi'],'organisasi');
        // $kerja = $request['kerja'];
        // $skil = $request['skil'];
        // $edukasi = $request['edukasi'];
        // $prestasi = $request['prestasi'];
        // $training = $request['training'];
        // $organisasi = $request['organisasi'];
        $user = $request['user'];

        //dd($prestasi);

        $pdf = PDF::loadview('pages.cv.print.cv_ats_print',compact('user','organisasi','kerja','edukasi','training','skil','prestasi'));
        return $pdf->stream();
        return $pdf->download('cv-ats.pdf');
    }

    public function index(Request $request){

        if(Auth::check()){
            $kerja = CVKerja::where('id_user',auth()->user()->id)->get();
            $skil = CVSkil::where('id_user',auth()->user()->id)->get();
            $edukasi = CVEdukasi::where('id_user',auth()->user()->id)->get();
            $portofolio = CVPortofolio::where('id_user',auth()->user()->id)->get();
            $prestasi = CVPrestasi::where('id_user',auth()->user()->id)->get();
            $training = CVTraining::where('id_user',auth()->user()->id)->get();
            $organisasi = CVOrganisasi::where('id_user',auth()->user()->id)->get();
            $user = User::find(auth()->user()->id); 

            $cvs = CVTema::latest()->get();
            $cv_user = CVUser::find(auth()->user()->id);
            $cv_user = $cv_user != null ? $cv_user->id : null;

            $request->session()->put('cv', 3);

        
            return view('pages.cv.cv_data',compact('user','organisasi','kerja',
                                                    'edukasi','training','skil',
                                                    'prestasi','cvs','cv_user'));
        }else{
            return view('pages.cv.cv_public');
        }

    }

    public function print(Request $request){

        $kerja = CVKerja::where('id_user',auth()->user()->id)->get();
        $skil = CVSkil::where('id_user',auth()->user()->id)->get();
        $edukasi = CVEdukasi::where('id_user',auth()->user()->id)->get();
        $portofolio = CVPortofolio::where('id_user',auth()->user()->id)->get();
        $prestasi = CVPrestasi::where('id_user',auth()->user()->id)->get();
        $training = CVTraining::where('id_user',auth()->user()->id)->get();
        $organisasi = CVOrganisasi::where('id_user',auth()->user()->id)->get();
        $user = User::find(auth()->user()->id); 

        $request->id = $request->id == null ? 0 : $request->id;
        $cvUser = CVUser::updateOrCreate(['id_user' => auth()->user()->id],[
            'id_tema' => $request->session()->get('cv'),
        ]);

        $pdf = PDF::loadview('pages.cv.print.cv_ats_print',compact('user','organisasi','kerja','edukasi','training','skil','prestasi'));
        return $pdf->stream();
        return $pdf->download('cv-ats.pdf');


        //*Simpan tidak ada tipe
        // if($request->session()->get('cv') == 1){
        //     $pdf = PDF::loadview('pages.cv.print.cv_basic1_print',compact('user','organisasi','kerja','edukasi','training','skil','prestasi'));
        //     return $pdf->stream();
        //     return $pdf->download('cv-basic.pdf');

        // }elseif($request->session()->get('cv') == 2){
        //     $pdf = PDF::loadview('pages.cv.print.cv_modern1_print',compact('user','organisasi','kerja','edukasi','training','skil','prestasi'));
        //     return $pdf->stream();
        //     return $pdf->download('cv-modern.pdf');
        // }elseif($request->session()->get('cv') == 3){
        //     $pdf = PDF::loadview('pages.cv.print.cv_ats_print',compact('user','organisasi','kerja','edukasi','training','skil','prestasi'));
        //     return $pdf->stream();
        //     return $pdf->download('cv-ats.pdf');
        // }else{
        //     $pdf = PDF::loadview('pages.cv.print.cv_green',compact('user','organisasi','kerja','edukasi','training','skil','prestasi'));
        //     return $pdf->stream();
        //     return $pdf->download('cv-ats.pdf');
        // }
    }

    public function setCV(Request $request){
        $request->session()->put('cv', $request->id);

        switch ($request->id) {
            case 1:
              $data = "basic";
              break;
            case 2:
                $data = "modern";
              break;
            case 3:
                $data = "ats";
              break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function getBio(Request $request){
        $data = User::find($request->id);
        return response()->json([
            'data' => $data->desc
        ]);
    }

    public function editBio(Request $request){
        $user = User::find(auth()->user()->id); 
        $user->desc = $request->bio;
        $user->save();

        return redirect()->back(); 
    }

    //WORKS HERE
    public function getWork(Request $request){
        $data = CVKerja::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function editWork(Request $request){

       CVKerja::updateOrCreate(['id' => $request->id],
       [
            'id_user' => auth()->user()->id,
            'alamat' => $request->alamat,
            'posisi' => $request->jabatan,
            'alamat' => $request->alamat,
            'perusahaan' => $request->perusahaan,
            'deskripsi' => $request->desc,
            'mulai' => $request->mulai,
            'akhir' => $request->akhir
       ]);

        return redirect()->back(); 
    }

    //EDU HERE 
    public function getEdu(Request $request){
        $data = CVEdukasi::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function editEdu(Request $request){

        CVEdukasi::updateOrCreate(['id' => $request->id],
        [
             'id_user' => auth()->user()->id,
             'sekolah' => $request->sekolah,
             'jenjang' => $request->level,
             'masuk' => $request->masuk,
             'keluar' => $request->keluar,
             'gpa' => $request->gpa,
             'jurusan' => $request->jurusan,
        ]);
 
         return redirect()->back(); 
    }

    //TRAIN HERE 
    public function getTrain(Request $request){
        $data = CVTraining::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function editTrain(Request $request){

        CVTraining::updateOrCreate(['id' => $request->id],
        [
             'id_user' => auth()->user()->id,
             'program' => $request->program,
             'penyelenggara' => $request->penyelenggara,
             'deskripsi' => $request->desc,
             'mulai' => $request->mulai,
             'akhir' => $request->akhir,
        ]);
 
         return redirect()->back(); 

    }

    //SKILL
    public function editSkil(Request $request){

        CVSkil::updateOrCreate(['id' => $request->id],
        [
             'id_user' => auth()->user()->id,
             'skil' => $request->skil,
        ]);
 
         return redirect()->back(); 

    }

    //PRESTASI
    public function getAcv(Request $request){
        $data = CVPrestasi::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function editAcv(Request $request){

        CVPrestasi::updateOrCreate(['id' => $request->id],
        [
             'id_user' => auth()->user()->id,
             'prestasi' => $request->prestasi,
             'organisasi' => $request->organisasi,
             'tahun' => $request->tahun,
             'desc' => $request->desc,
        ]);
 
         return redirect()->back(); 

    }

    //ORG HERE 
    public function getOrg(Request $request){
        $data = CVOrganisasi::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function editOrg(Request $request){

        CVOrganisasi::updateOrCreate(['id' => $request->id],
        [
             'id_user' => auth()->user()->id,
             'posisi' => $request->posisi,
             'organisasi' => $request->organisasi,
             'deskripsi' => $request->desc,
             'mulai' => $request->mulai,
             'akhir' => $request->akhir,
        ]);
 
         return redirect()->back(); 

    }

    public function editKontak(Request $request){

        $user = User::find(auth()->user()->id);
        $user->telepon = $request->telepon;
        $user->linkedin = $request->linkedIn;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

         return redirect()->back(); 
    }




}
