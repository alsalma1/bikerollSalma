<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use App\Models\Race;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class pictureController extends Controller
{
    //
    public function uploadF(Request $request){
        $carrera = Race::find($request->id);
        if ($request->isMethod('post')){
            if ($request->hasFile('file')) {
                $imagenes = $request->file('file')->store('public/imagenes');//hay que crear la carpeta imagenes en storage/app/public
                $url = Storage::url($imagenes);
                $newString = str_replace("/storage/", "/storage/app/public/", $url);
                echo $newString;

                Picture::create([
                    'race_id' => $request->id,
                    'image' => $newString,
                ]);
            }
        }      
        else{
            return view('admin.carreras.subirFotos' ,[
                'carreras' => $carrera
            ]);
        }
    }

    public function viewF(Request $request){
        $carrera = Race::find($request->id);
        
        $pictures= Picture::where('race_id',$request->id)->get();
        return view('admin.carreras.verFotos' ,[
            'fotos' => $pictures,
            'carreras'=> $carrera
        ]);
        
    }


    public function publica(Request $request){
        $carrera = Race::find($request->id);
        
        $pictures= Picture::where('race_id',$request->id)->get();
        return view('gallery' ,[
            'fotos' => $pictures,
            'carreras'=> $carrera
        ]);
        
    }



    public function viewPage(Request $request){
        $carrera = Race::find($request->id);
        
        $pictures= Picture::where('race_id',$request->id)->get();
        return view('fotosCarreras' ,[
            'fotos' => $pictures,
            'carreras'=> $carrera
        ]);
        
    }
}
?>