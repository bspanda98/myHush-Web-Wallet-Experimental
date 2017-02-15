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
                  {{ $totalsend }}
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
        <th>Date</th>
        <th>Amount</th>
        <th>Address</th>
        <th>Send/Recieved</th>
        <th>Txid</th>
      </tr>
    </thead>
    <tbody>
      @foreach($transactions as $transaction)
        <tr>
          <td>{{ $transaction->updated_at }}</td>
          <td>{{ $transaction->amount }}</td>
          <td>{{ $transaction->updated_at }}</td>
          <td>{{ $transaction->address }}</td>
          <td>{{ $transaction->send }}</td>
          <td>{{ $transaction->txid }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
@endsection
