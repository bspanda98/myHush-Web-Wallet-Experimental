<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addresses;
use Auth;
use JsonRPC\Client;

class AddressesController extends Controller
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
   * Show the Dashboard addresses page
   *
   * @return \Illuminate\Http\Response
   */
   public function Index()
   {
     $addresses = Addresses::where(['userid' => Auth::id()])->get();

     return view('dashboard.addresses', ['addresses' => $addresses]);
   }

   /*
   * Generate a new addresses
   *
   * @return String Address
   */
   public function NewAddress()
   {
     $client = new Client(env('ZCASHD'));

     $NewAddress = $client->execute('getnewaddress');

     if(!empty($NewAddress)) {
       return $NewAddress;
     }

     return false;

   }

}
