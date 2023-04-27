<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Runner;
use App\Models\Race;
use App\Models\Insurance;
use App\Models\Inscription;
use App\Models\Ensure;
use Illuminate\Support\Facades\DB;

class corredorController extends Controller{
    //
    public function showForm(Request $request){
        //común para enviar a inscripciones y form
        $id = $request->id;
        $races = Race::find($id);

        if(isset ($_POST['inscription'])){
            //control de isncripciones

            //Control de dupplicados, movida máxima pero funciona :D
            $corredores=Runner::where('name',request('nombre'))->where('last_name',request('surname'))->where('birth_date',request('birth'))->get();
            if ($corredores->count()>0){$result=Inscription::where('race_id',$request->id)->where('runner_id',$corredores[0]['id'])->count();

            if ($result!=0){
                ?><script> alert("Ya te has inscrito en esta carrera") </script><?php
                return view('corredor.altaCorredor',[
                    'races' => $races,
                    'aseguradoras' => Insurance::select('insurances.*')
                    ->join('ensures', 'ensures.id_insurances', '=', 'insurances.id')->
                    where('ensures.id_race','=', $request->id)->get(),
    
                    'ensures' => Ensure::select('ensures.*')->where('ensures.id_race', '=', $request->id)->get()
                ]);
            }
        }
            
            //el ordden es importante ... >:CCC
            if (Inscription::where('race_id', request('id'))->count()<$races->number_participants){
                if(request('sexo')=='masculino'){
                    $sex=1;
                }
                else{
                    $sex=0;
                }

                if(request('option')=='pro'){
                    $pro=1;
                }
                else{
                    $pro=0;
                }

                
                

                $runner=Runner::create([
                    'name'=>request('nombre'),
                    'last_name'=>request('surname'),
                    'adress'=>request('direction'),
                    'birth_date'=>request('birth'),
                    'sex'=>$sex,
                    'pro'=>$pro,
                    'federation_number'=>request('fed'),
                    'points'=>0

                ]);


                // $corredor=DB::table('runners')->where('name', request('nombre') );
                $nameAs=request('aseguradora');

                $As=Insurance::where('name', $nameAs)->first();
                //hacerlo así si no peta(poner nombre en la ruta!!)
                
                // if ($pro==0){
                    return redirect()->route('ins',[
                            'runner'=>$runner->id,
                            'id'=> request('id'),
                            'aseguradora' => $As->id,
                            'pro' => $pro
                            
                    ]);
                //}
                // else{
                //     return redirect('/');
                // }
            }
            else{
                ?> <script>alert('No se pueden inscribir más corredores')</script> <?php
                // return view('corredor.altaCorredor',[
                //     'races' => $races,
                //     'aseguradoras' => Insurance::all()
                // ]);
                return view('corredor.altaCorredor',[
                    'races' => $races,
                    'aseguradoras' => Insurance::select('insurances.*')
                    ->join('ensures', 'ensures.id_insurances', '=', 'insurances.id')->
                    where('ensures.id_race','=', $id)->get(),
    
                    'ensures' => Ensure::select('ensures.*')->where('ensures.id_race', '=', $id)->get()
                ]);
            }
            
        }
       

        else{
            return view('corredor.altaCorredor',[
                'races' => $races,
                'aseguradoras' => Insurance::select('insurances.*')
                ->join('ensures', 'ensures.id_insurances', '=', 'insurances.id')->
                where('ensures.id_race','=', $id)->get(),

                'ensures' => Ensure::select('ensures.*')->where('ensures.id_race', '=', $id)->get()
            ]);
        }

    }
}