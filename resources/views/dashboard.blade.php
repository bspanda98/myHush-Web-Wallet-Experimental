@extends('layouts.app')
@section('custom-styles')
<link href="/css/dashboard.css" rel="stylesheet">
@endsection
@section('custom-nav')
<li><a href="{{ url('dashboard/addresses') }}">Addresses</a></li>
@endsection

@section('content')
<div class="container stat-boxes">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Total Transactions</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Total Recieved</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Total Send</div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container latest-transactions">
  <div class="row">
    <h3>Latest transactions</h3>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Receiving address</th>
        <th>Txid</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  </div>
</div>
</div>
@endsection
