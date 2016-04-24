<?php

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User=Auth::user();
        if($User->admin==1)
        {
        $Reports=Report::orderBy('Progress','desc')
                        ->orderBy('Status','desc')
                        ->orderBy('user_id','desc')
                        ->get();
        }
        else
        {
                $Reports=Report::where('user_id',$User->id)
                ->orderBy('Progress','desc')
                ->orderBy('Status','asc')
                ->get();
        }
                
        return view('report',compact('Reports','User'));
    }
}
