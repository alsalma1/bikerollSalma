<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Insurance;
use App\Models\Ensure;
use App\Models\Race;
use Illuminate\Support\Facades\DB;


class aseguradoraController extends Controller
{
    public function index(Request $request){
        if(isset($_POST['buscador'])){
            $buscador = $request->input('buscador');
            $insurance = Insurance::where('cif', 'LIKE', '%' . $buscador . '%')
                        ->orWhere('name', 'LIKE', '%' . $buscador . '%')
                        ->orWhere('address', 'LIKE', '%' . $buscador . '%')
                        ->get();        
        }
        else{
            $insurance = Insurance::all();
        }
        return view('admin.aseguradoras.mostrarTodosAs' , [
            'insurance' => $insurance
        ]);
    }

    //Añadir nueva aseguradora
    public function create(Request $request){
        $insurance = new Insurance();
        if(isset($_POST['create'])){
            $cif = $insurance->CIF = $_POST['cif'];
            //Si existe la clave primaria
            if (Insurance::where('CIF', $cif)->exists()) {
                ?><script>alert("Ya existe esta aseguradora!")</script><?php
                return view('admin.aseguradoras.anyadirAseguradora');
            }
            else{
                $insurance->name = $_POST['insuranceName'];
                $insurance->address = $_POST['insuranceAddress'];
                $insurance->price = $_POST['price'];
                $insurance->save();
                ?>
                <script>alert("Se ha creado correctamente!")</script>
                <?php
                return redirect()->route('mostrarTodosAs');
            }
        }        
        else{
            return view('admin.aseguradoras.anyadirAseguradora');
        }
    }

    public function activate(Request $request){
        $id = $request->id;
        $insurance = Insurance::find($id);
        $estado = $insurance->estado;
        if($estado==1){
            $estado = $insurance->estado = 0;
        }
        else{
            $insurance->estado = 1;
        }
        $insurance->save();
        $insurance = Insurance::all();
        
        return redirect('mostrarTodosAs');  
    }

    public function edit(Request $request){
        $id = $request->id;
        //Formulario para modificar una aseguradora
        $insurance = Insurance::find($id);
        //Si se envian datos , modifica el registro
        if ($request->isMethod('post')){
            $insurance->CIF = $request->input('cif');
            $insurance->name = $request->input('insuranceName');
            $insurance->address = $request->input('insuranceAddress');
            $insurance->price = $request->input('insurancePrice');
            $insurance->save();
            $insurance = Insurance::all();
            $mensaje = "¡La aseguradora ha sido modificada correctamente!";
            session()->flash('mensaje', $mensaje);
            return redirect()->route('mostrarTodosAs' , ['carreras'=>$insurance]); 
        }      
        else{
            return view('admin.aseguradoras.editarAseguradora' ,['insurance' => $insurance]);
        }
    }

    public function precioCarrera(Request $request){
        //id carrera primer paso
        $id = $request->id;
        
        if (isset($_POST['envio'])){
            foreach ($_POST['opciones'] as $as) {
                //coge el id de la aseguradora
                $insurance= Insurance::find($as);
                $ensure= new Ensure();
                $idR=$request->idC;

                if (Ensure::Where('id_insurances',$as)->where('id_race',$idR)->exists()){
                    echo 'La aseguradora con '.$ensure->name.' ya ha sido seleccionada';
                }
                else{
                    $ensure->id_insurances = $as;
                    $ensure->id_race = $request->idC;

                    //al precio base se le suma ientre 10 y 50€ mas por
                    $ensure->price = $insurance->price+rand(10,50);
                    $ensure->save();
                }                
            }
            $race = Race::all();
        
            //hay que hacerlo asi si no peta y no se muestran las imagenes por el id
            return redirect()->route('editarCarrera',[
                'carreras' => $race
            ]);  

            //id carrera último paso
            // echo $request->idC;
            
        }
        else{
            //Arreglar esto para que solo deje seleccionar las que ya no están 

            $insurance = Insurance::where('estado',1)->get();
            // $insid= Insurance::find($id);
            // $ensure = Ensure::where('id_race');
            // $insurance = Insurance::join('ensures', 'ensures.id_insurances', '!=', 'insurances.id')
            // ->join('races', 'races.id', '!=', 'ensures.id_race')
            // ->get(['insurances.*']);

            // if (!empty($insurance)){
            //     $insurance = Insurance::all();
            // }

            return view('admin.aseguradoras.altaCarrera',['insurance' => $insurance, 'idC' => $id]);
        }
    }
}
