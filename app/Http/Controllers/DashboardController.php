<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Addresses;

class DashboardController extends Controller
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
  public function Index()
  {
      return view('dashboard');
  }
  /**
   * Show the dashboards addresses.
   *
   * @return \Illuminate\Http\Response
   */
   public function Addresses()
   {
     $addresses = Addresses::where(['userid' => Auth::id()]);

     return view('dashboard.addresses', ['addresses' => $addresses]);

   }

}
