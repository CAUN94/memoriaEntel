<?php
/*
Controla las paginas que tienen que ver con reportes.
*/


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
        $this->middleware('auth'); // Revisa que el usuario este logeado
    }

    public function index(Report $Report)
    {	
        $User=User::where('id',$Report->user_id)->get(); // Informacion del usuario que hizo el reporte
        $admin=Auth::user(); // Informacion del administrador de reporte
    	return view('report.index',compact('Report','User','admin')); // Retorna a la carpeta report a la pagina index.blade con array de Report User y Admin
    }

    public function update()
    {
        $User=Auth::user(); // Informacion del usuario logeado
        if($User->admin==1) // Si es admin
        {
        $Reports=Report::where('Status',1) // Muestra los reportes a los que se les solocito Status
                ->orderBy('Progress','desc')
                ->get(); 
        }
        else
        {
        // Muestra los reportes a los que el admin solicito Status
        $Reports=Report::where('user_id',$User->id)
                ->where('Status',1)
                ->orderBy('Progress','desc')
                ->get();
        }

        



        return view('report.update',compact('Reports')); // Retorna a la carpeta report a la pagina update.blade y compacta el arreglo Reports
    }

    public function form(Report $Report)
    {
        //Retorna la info del Report para modificarla en un formulaio en la pagina formo dentro de la carptea report 
         return view('report.form',compact('Report'));
    }

    public function save(Report $Report,Request $request)
    {   
         // Recupera los valores del Post del formulario
        // Y la Info del Report modificado

         $Report->Status=0; // Le Cambia el Status ha revisado
         $Report->Progress=$request->progress; // Modifica el nuevo proreso
         $Report->save(); // Guarda
         return Redirect::to('/Report'); // Redirige a esa pagina

    }

       public function saveadmin(Report $Report,Request $request)
    {   
         // Lo mismo que el anterior pero para los admin que pueden modificar más cosas

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
        // El formulario de update del admin
        return view('report.adminupdate',compact('Report'));
    }

 

    public function mail(Report $Report)
    {	
        //Envia un mail, debe estar en un servido para funcionar

    	// Mail 

   		// $to = 'Paselramo@gmail.com'; 
    	// $email_subject = "Solicitud de inscripción";
    	// $email_body = "El alumno $request->Nombre quiere inscribir un ramo.\n\n"."Su mail es: $request->Mail\n\nTelefono: $request->Telefono\n";
    	// $headers = "From: noreply@ypaselramo.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    	// $headers .= "Reply-To: crugarte@alumnos.uai.cl";    
    	// mail($to,$email_subject,$email_body,$headers);


        //Cambia el Status ha solicitado y devuelve a home
    	$Report->Status=1;
    	$Report->save();
        return Redirect::to('/home');
    }
    

    


}
