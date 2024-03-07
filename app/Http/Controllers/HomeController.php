<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courrier;
use App\Models\Service;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $userCount= User::count();
      
      $mailCount= Courrier::count();


      // courriers sortants
      $mailSendCount= Courrier::where('type','=','sortant')->count();

      // courriers entrants
      $recevingMailCount= Courrier::where('type','=','entrant')->count();

      $departmentCount = Departement::count();
      $serviceCount = Service::count();

        return view('home', compact('userCount','mailCount', 'mailSendCount','recevingMailCount',
         'departmentCount', 'serviceCount' ));
    }
}
