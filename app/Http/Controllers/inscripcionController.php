<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Runner;
use App\Models\Race;
use App\Models\Ensure;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;

class inscripcionController extends Controller{

    public function generarDorsal(){
        $dorsal = random_int(1,300); // Genera un número aleatorio
        // Consulta la base de datos para comprobar si el número de dorsal ya está en uso
        $dorsal_existe = DB::table('inscriptions')->where('dorsal', $dorsal)->exists();
        if($dorsal_existe){ // Si el número de dorsal ya existe en la base de datos, se vuelve a generar otro número
            return $this->generarDorsal();
        }
        else{ // Si el número de dorsal no existe en la base de datos, se devuelve el número generado
            return $dorsal;
        }
    }
    
    public function inscribir(Request $request){
        
        if (isset($_POST['pagar'])){
            if (request('option')=='si'){
                $dorsal = $this->generarDorsal();
                $aseguradora=$request->aseguradora;
                if ($request->pro==1){
                    $aseguradora=NULL;
                }
                Inscription::create([
                    'runner_id'=>$request->runner,
                    'race_id'=>$request->id,
                    'id_insurances'=>$aseguradora,
                    'dorsal'=> $dorsal,
                    'PayPal_email'=>'',
                    'finish_time'=>NULL
                ]);

                //Pasar el precio a paypal 
                $price=Race::select('price')->where('id',$request->id)->get();

                if($request->pro==0){
                    $p=Ensure::select('price')->where('id_race',$request->id)->where('id_insurances',$aseguradora)->get();
                    $price=$p[0]['price']+$price[0]['price'];
                }
                else{
                    $price=$price[0]['price'];
                }
                return redirect()->route('paypal',[
                    'price'=> $price
                ]);
            }
            
            else{
                $ins=Inscription::where('runner_id',$request->runner)->delete();
                $runner=Runner::find($request->runner)->delete();
                //se borra tanto de corredor como de inscripcion
                return redirect('/');
            }
        }
        else{

            return view('corredor.pago',[
                'runner' => $request->runner,
                'race' => $request->id,
                'insurance' => $request->aseguradora,
                'pro' => $request->pro
            ]);
        }
    }

    public function facturaCorredor(Request $request){
        $runner = $request->runner;
        $race = $request->race;
        //Informacion de carrera y corredor
        $results = DB::table('inscriptions')
                ->join('races', 'races.id', '=', 'inscriptions.race_id')
                ->join('runners', 'runners.id', '=', 'inscriptions.runner_id')
                ->leftJoin('insurances', 'insurances.id', '=', 'inscriptions.id_insurances')
                ->select('races.*', 'inscriptions.*', 'runners.*', 'insurances.*', 'insurances.price as insurance_price', 'races.price as race_price', 'runners.name as nameR', 'insurances.name as nameI')//Dar alias a la columna price
                ->where('inscriptions.runner_id', '=', $runner)
                ->where('inscriptions.race_id', '=', $race)
                ->get();

        view()->share('Factura_carrera.pdf',$results);
        if(count($results)==0){
            echo "No existe ningúna carrera con el id:".$race;
            return redirect('/');
        }
        else{
            $pdf = PDF::loadView('corredor.facturaCorredor', ['results' => $results]);
            return $pdf->download('Factura_carrera.pdf');
            //return view('corredor.facturaCorredor',['results' => $results]);
        }

    }

    public function showRunners(Request $request){
        $id = $request->id;
        if(isset($_POST['buscador'])){
            $buscador = $request->input('buscador');
            $runners = DB::table('inscriptions')
            ->join('runners', 'inscriptions.runner_id', '=', 'runners.id')
            ->select('inscriptions.*', 'runners.*')
            ->where('inscriptions.race_id', '=', $id)
            ->where(function($query) use ($buscador){
                $query->where('runners.name', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.last_name', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.sex', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.adress', 'LIKE', '%'.$buscador.'%')
                      ->orWhere('runners.points', 'LIKE', '%'.$buscador.'%');
            })
            ->get();
        }
        else{
            //Juntar las tablas runners , carrera y inscription
            $runners = DB::table('inscriptions')
            ->join('runners', 'inscriptions.runner_id', '=', 'runners.id')
            ->select('inscriptions.*', 'runners.*')
            ->where('inscriptions.race_id', '=', $id)
            ->get();
        }
        return view('admin.inscripciones.runnersRace' ,[
            'runners' => $runners , 'id' => $id
        ]);
    }

    public function downloadPdf(){
        if(isset($_POST)){
            echo $_POST['id_runner'];
        }
        $inscription = Inscription::all();

        view()->share('users.pdf',$inscription);

        $pdf = PDF::loadView('admin.inscripciones.generatePDF', ['inscription' => $inscription]);

        return $pdf->download('inscripciones.pdf');
    }

    public function mostrarDatosQr(Request $request){
        $id_race = $request->id_race;
        $id_runner = $request->id_runner;
        $fechaActual = date('H:i:s');

        $runners = DB::table('inscriptions')
                ->join('races', 'races.id', '=', 'inscriptions.race_id')
                ->join('runners', 'runners.id', '=', 'inscriptions.runner_id')
                ->select('races.*', 'inscriptions.*', 'runners.*')
                ->where('inscriptions.runner_id', '=', $id_runner)
                ->get();

        //Hay que configurar la zona horaria en config/app.php -> 'timezone' => 'Europe/Madrid',
        $inscription = Inscription::where('runner_id', $id_runner)
                    ->where('race_id', $id_race)
                    ->first();

        if ($inscription) {
            // Actualizar el campo 'finish_time'
            $inscription->update([
                    'finish_time' => $fechaActual
                ]);
        }
        //Obtener todos los corredores y orderalos por 
        $ganadores = Inscription::whereNotNull('finish_time')->orderBy('finish_time')->get();
        // Variables para el puntaje
        $puntos = 1000;
        $incremento = -100;

        // Actualizar los puntos de los corredores en la tabla correspondiente
        foreach ($ganadores as $ganador) {
            // Obtener el corredor correspondiente a esta inscripción
            $corredor = Runner::findOrFail($ganador->runner_id);

            // Asignar los puntos y actualizar la base de datos
            $corredor->points = $puntos;
            $corredor->save();

            // Actualizar la variable de puntos para el siguiente corredor
            $puntos += $incremento;
        }
        return view('corredor.datosCorredorQr', ['runners' => $runners]);
    }
}

?>