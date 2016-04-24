<?php
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
            // $excel = new SimpleExcel('CSV');
            // $excel->parser->loadFile('libro1.csv');
            // $get =  $excel->parser->getRow(1);
            // if(empty($get))
            //     return 1;
            // else
            //     return var_dump($get);

        $excel = new SimpleExcel('CSV');
            $excel->parser->loadFile('libro1.csv');
            $get =  $excel->parser->getColumn(1);
            $count = count($get);
            // if($get[3]!=null)
            // return 'Hola';
            // else
            // return 'nada';

            for ($i=2; $i<$count;$i++)
            {
                    if($get[$i]!=null)
                    {
                    $get1 =  $excel->parser->getRow(($i));
                    if($get1[9]!=null)
                    {
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
             return back();

            }   
        }