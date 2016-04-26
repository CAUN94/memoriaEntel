<?php
/*
Importa los valores de excel
*/

namespace App\Http\Controllers;
 
use App\Report;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use SimpleExcel\SimpleExcel;
use Auth;

class ImportController extends Controller
{
     public function import()
    {

        $excel = new SimpleExcel('CSV'); // Libreria de excel
            $excel->parser->loadFile('libro1.csv'); // Archivo excel a leer
            $get =  $excel->parser->getColumn(1); // Toma todos los valores de la columna uno
            $count = count($get); // Cuenta los valores (para saber el largo del excel)

            for ($i=2; $i<$count;$i++) // lee todo el excel parte del 2, porque el 1 son los titulos
            {
                    if($get[$i]!=null)
                    {
                    $get1 =  $excel->parser->getRow(($i)); //Si el valor de la columna existe entra
                    if($get1[9]!=null) // Si el valor de la celda que esta leyendo no es nulo entra (para evitar subir lineas vacias)
                    {
                    // Crea un nuevo reporte utilizando el modelo

                    // Agregua todos los datos
                    $Report= new Report;
                    $Report->user_id = Auth::user()->id;
                    $Report->Cockpit = $get1[4];
                    $Report->Market = $get1[5];
                    $Report->FGI = $get1[7];
                    $Report->FGE = $get1[8];
                    $Report->Horizontes = $get1[6];
                    $Report->Proyects = $get1[9];
                    $Report->Activities = $get1[10];
                    $Report->Innovation_Categories = $get1[11];
                    $Report->Priority = $get1[13];
                    $Report->Finish_at = $get1[14];
                    $Report->Finish_at = 20140909;
                    $Report->Responsable = Auth::user()->name;
                    $Report->Leadership = $get1[16];
                    $Report->Rol = $get1[18];
                    $Report->comments = $get1[19];
                    $Report->Progress = 1;
                    $Report->Status = 0;
                    $Report->save();
                    }
                    }
                    
             }
             return back(); // Retorna a la pagina anterior

            }   
        }