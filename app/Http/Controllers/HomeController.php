<?php

/*
Controlador de la pagina de inicio
*/

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Report;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*
        Comprueba que este logeado el usuario
        */
        $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        Muestra el index y varia si el usuario es admin y si no
        */
        $User=Auth::user(); // Toma todos los datos del User que esta logeado
        if($User->admin==1)
        {
        /*
        Si es admin muestra todos los reportes ordenados por usuario y por status
        */
        $Reports=Report::orderBy('Progress','desc')
                        ->orderBy('Status','desc')
                        ->orderBy('user_id','desc')
                        ->get();
        }
        else
        {
        /*
        Si no es admin muestra los reportes que el subio ordenados de igual forma.
        */
                $Reports=Report::where('user_id',$User->id)
                ->orderBy('Progress','desc')
                ->orderBy('Status','asc')
                ->get();
        }
        /*
        Envia a la pagian blade.report y envia un arregloe con los valoes de User y de report.
        */
        return view('report',compact('Reports','User'));
    }
}
