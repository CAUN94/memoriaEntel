<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Report;
use App\User;
use Redirect;
use Session;
use Auth;

class ReportController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Report $Report)
    {	
        $User=User::where('id',$Report->user_id)->get();
        $admin=Auth::user();
    	return view('report.index',compact('Report','User','admin'));
    }

    public function update()
    {
        $User=Auth::user();
        if($User->admin==1)
        {
        $Reports=Report::where('Status',1)
                ->orderBy('Progress','desc')
                ->get();
        }
        else
        {
        $Reports=Report::where('user_id',$User->id)
                ->where('Status',1)
                ->orderBy('Progress','desc')
                ->get();
        }

        



        return view('report.update',compact('Reports'));
    }

    public function form(Report $Report)
    {
         return view('report.form',compact('Report'));
    }

    public function save(Report $Report,Request $request)
    {   
         

         $Report->Status=0;
         $Report->Progress=$request->progress;
         $Report->save();
         return Redirect::to('/Report');

    }

       public function saveadmin(Report $Report,Request $request)
    {   
         

         $Report->Cockpit=$request->Cockpit;
         $Report->Market=$request->Market;
         $Report->FGI=$request->FGI;
         $Report->FGE=$request->FGE;
         $Report->Responsable=$request->Responsable;
         $Report->Leadership=$request->Leadership;
         $Report->Rol=$request->Rol;
         $Report->comments=$request->comments;
         $Report->save();
         return Redirect::to('/home');

    }


    public function updateform(Report $Report)
    {   
        return view('report.adminupdate',compact('Report'));
    }

 

    public function mail(Report $Report)
    {	
    	// Mail 

   		// $to = 'Paselramo@gmail.com'; 
    	// $email_subject = "Solicitud de inscripción";
    	// $email_body = "El alumno $request->Nombre quiere inscribir un ramo.\n\n"."Su mail es: $request->Mail\n\nTelefono: $request->Telefono\n";
    	// $headers = "From: noreply@ypaselramo.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    	// $headers .= "Reply-To: crugarte@alumnos.uai.cl";    
    	// mail($to,$email_subject,$email_body,$headers);

    	$Report->Status=1;
    	$Report->save();
        return Redirect::to('/home');
    }
    

    


}
