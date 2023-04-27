<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Sponsor;

class principalPageController extends Controller
{
    public function __invoke(){
        //proximas
        $races = Race::where('state',1)->orderBy('date', 'ASC')->get();

        //finalizadas
        $fin = Race::where('state',1)->orderBy('date', 'DESC')->get();  //->limit('2')

        $sponsors = Sponsor::where('sponsorState',1)
                            ->where('main_plain',1)
                            ->get();
        return view('paginaPrincipal' , [
            'races' => $races , 'sponsors' => $sponsors , 'fin' => $fin
        ]);
    }

    public function show(){
        $races = Race::where('state',1)->get();
        return view('paginaPrincipal' , [
            'races' => $races
        ]);
    }

    public function showPrincipalPage(){
        return view('admin.paginaPrincipal');
    }
}

?>
