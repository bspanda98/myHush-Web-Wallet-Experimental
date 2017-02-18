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

      $totalsend = $this->GetTotalAmount('send');
      $totalrecieved = $this->GetTotalAmount('recieved');

      $totaltransactions = $this->CountTransactions();

      return view('dashboard', ['transactions' => $transactions,
                                'totalsend' => $totalsend,
                                'totalrecieved' => $totalrecieved,
                                'totaltransactions' => $totaltransactions]);
  }

   /**
   *Get total amount send / recieved
   *
   *@return Float
   */

   private function GetTotalAmount($what)
   {
     $transactions = Transactions::where(['userid' => Auth::id(), 'category' => $what])->get();

     $total = 0;

     foreach($transactions as $transaction) {
       $total = $total + $transaction['amount'];
     }

     return (float)$total;

   }

   /**
   *Get toal amount of transactions
   *
   *@return int
   */

   private function CountTransactions()
   {
    $transactions = Transactions::where(['userid' => Auth::id()])->count();

    return $transactions;

   }


}
