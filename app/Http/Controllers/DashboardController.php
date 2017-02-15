<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Addresses;
use App\Transactions;

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
      $transactions = Transactions::where(['userid' => Auth::id()])->get();

      $totalsend = $this->GetTotalSend();

      return view('dashboard', ['transactions' => $transactions, 'totalsend' => $totalsend]);
  }
  /**
   * Show the dashboards addresses.
   *
   * @return \Illuminate\Http\Response
   */
   public function Addresses()
   {
     $addresses = Addresses::where(['userid' => Auth::id()])->get();

     return view('dashboard.addresses', ['addresses' => $addresses]);

   }

   /**
   *Get total amount send
   *
   *@return Float
   */

   private function GetTotalSend()
   {
     $transactions = Transactions::where(['userid' => Auth::id(), 'category' => 'send'])->get();

     $total = 0;

     foreach($transactions as $transaction) {
       $total = $total + $transaction['amount'];
     }

     return (float)$total;

   }

}
