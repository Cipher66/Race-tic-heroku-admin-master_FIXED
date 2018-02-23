<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coche;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarrerasEnVivoController extends Controller
{
    //Redireccionamiento al login si el usuario intenta entrar sin estar logeado
    protected $redirectTo = '/carrerasenvivo';
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){

        $id = Auth::user()->id;
        $datocarreras = DB::table('carreras')->where('usuario_id',$id)->count();
        if($datocarreras > 0){
            return view('Carreras.carrerasenvivo');
        }else{
            return back();
        }


    }

}
