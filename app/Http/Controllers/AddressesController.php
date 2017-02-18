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
     $addresses = Addresses::where(['userid' => Auth::id()])->orderBy('id', 'desc')->get();

     return view('dashboard.addresses', ['addresses' => $addresses]);
   }

  /**
   * Generate a new addresses
   *
   * @return String Address
   */
   public function NewAddress(Request $request)
   {
     $client = new Client(env('ZCASHD'));

     $NewAddress = $client->execute('getnewaddress');

     if(!empty($NewAddress)) {
       //Insert new address into DB
       $address = new Addresses;

       $address->userid = Auth::id();
       $address->address = $NewAddress;

       if(isset($request->label)) {
         $address->label = $request->label;
       }

       $address->save();

       return $address;

     }

     return false;

   }

}
