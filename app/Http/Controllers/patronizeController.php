<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patronize;
use App\Models\Sponsor;
use App\Models\Race;
use Illuminate\Support\Facades\DB;
use PDF;
use Termwind\Components\Raw;

class patronizeController extends Controller
{
    public function showSponsors(){
        $sponsors = Sponsor::all();
        $races = Race::all();
        return view('admin.patronizar.sponsorCarrera' , [
            'sponsors' => $sponsors , 'races' => $races
        ]);
    }

    public function showRaces(Request $request){
        $id = $request->id;
        $id_races = $request->input('racescheck');
        if(isset($_POST['select'])){ 
            //Guardar todos los id de carreras en la tabla            
            foreach ($id_races as $idr) {
                Patronize::create([
                    'sponsor_id'=>$id,
                    'race_id' => $idr,
                ]);
            }
            $sponsor = Sponsor::all();  
            $mensaje = "Se han guardado los datos correctamente";
            session()->flash('mensaje', $mensaje);//los scripts no se muestran aqui , entonces se crea el mensaje , se pasa a la vista con flash y en la vista se crea una alerta con el el mensaje enviado
            return redirect()->route('mostrarSponsors' , [
                'sponsor' => $sponsor
            ]);
        }
        else{
            //$races = Race::all();
            $races = Race::whereNotIn('id', function ($query) use ($id) {
                $query->select('race_id')
                    ->from('patronize')
                    ->where('sponsor_id', $id);
            })->get();
            return view('admin.sponsors.elegirCarreras' , [
                'races' => $races , 'id' => $id
            ]);
        }
    }

    public function downloadPdf(Request $request){
        $id = $request->id;//id sponsor
        $patronize = Patronize::where('sponsor_id', '=', $id)->get();
        $sponsor = Sponsor::all();
        // Si no se haya seleccionado ninguna carrera para el sponsor, no se puede imprimir el pdf de la factura
        if ($patronize->isEmpty()) {
            ?>
            <!-- <script>alert("")</script> -->
            <?php
                $mensaje = "No puedes imprimir la factura antes de seleccionar por lo menos una carrera!";
                session()->flash('mensaje', $mensaje);//los scripts no se muestran aqui , entonces se crea el mensaje , se pasa a la vista con flash y en la vista se crea una alerta con el el mensaje enviado
                return redirect()->route('mostrarSponsors' , [
                    'sponsor' => $sponsor
                ]);
                return view('admin.sponsors.mostrarSponsors', ['sponsor' => $sponsor]);
        } 
        else{
            $facturaSponsor = DB::table('patronize as p')
            ->select('r.*', 's.*', 'p.race_id')
            ->join('sponsors as s', 'p.sponsor_id', '=', 's.id')
            ->join('races as r', 'p.race_id', '=', 'r.id')
            ->where('p.sponsor_id', '=', $id)
            ->get();

            if ($facturaSponsor->isEmpty()) {
            echo "Está vacía";
            } 
            else {
            view()->share('factura_sponsor.pdf',$facturaSponsor);

            $pdf = PDF::loadView('admin.sponsors.facturaSponsor', ['facturaSponsor' => $facturaSponsor]);
            return $pdf->download('factura_sponsor.pdf');
            // return view('admin.sponsors.facturaSponsor' , [
            //     'facturaSponsor' => $facturaSponsor
            // ]);
            }
        }
    }

    public function carreraSponsor(Request $request){
        $id = $request->id;

        if(isset($_POST['buscador'])){
            $buscador = $request->input('buscador');
            $races = DB::table('patronize')
                    ->select('patronize.*' , 'races.*')
                    ->join('races', 'patronize.race_id', '=', 'races.id')
                    ->where('sponsor_id', '=', $id)
                    ->where(function($query) use ($buscador) {
                        $query->where('title', 'LIKE', '%' . $buscador . '%')
                                ->orWhere('price', 'LIKE', '%' . $buscador . '%')
                                ->orWhere('date', 'LIKE', '%' . $buscador . '%');
                    })
                    ->get();      
        }
        else{
            $races = DB::table('patronize')
            ->select('patronize.*' , 'races.*')
            ->join('races', 'patronize.race_id', '=', 'races.id')
            ->where('sponsor_id', '=', $id)
            ->get();
        }

        return view('admin.sponsors.carreraSponsor' , ['races' => $races , 'id' =>$id]);
    }

    public function deleteRace(Request $request){
        $id_race = $request->id_race;
        $id = $request->id_sponsor;

        //Eliminar de la tabla 
        DB::table('patronize')
            ->where('race_id', $id_race)
            ->where('sponsor_id', $id)
            ->delete();

        $races = DB::table('patronize')
        ->select('patronize.*' , 'races.*')
        ->join('races', 'patronize.race_id', '=', 'races.id')
        ->where('sponsor_id', '=', $id)
        ->get();
        return redirect()->route('carreraSponsor', ['id' => $id]);
    }
}

?>
