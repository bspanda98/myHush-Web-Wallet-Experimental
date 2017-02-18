@extends('layouts.app')

@section('custom-styles')
<link href="/css/dashboard.css" rel="stylesheet">
@endsection

@section('custom-nav')
<li><a href="{{ url('dashboard/addresses') }}">Addresses</a></li>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <h3>Generate new address</h3>
    <div class="col-md-4">
    <div class="form-group">
      <label for="label">Label:</label>
      <input type="text" class="form-control" id="label">
    </div>
    <button type="button" class="btn btn-success">Generate</button>

  </div>
  </div>
</div>
<div class="container latest-transactions">
<div class="row">
  <h3>Addresses</h3>
<div class="table-responsive">
<table class="table">
  <thead class="latest-transactions-header">
    <tr>
      <th>Date generated</th>
      <th>Address</th>
      <th>Label</th>
    </tr>
  </thead>
  <tbody>
    @foreach($addresses as $address)
      <tr>
        <td>{{ $address->updated_at }}</td>
        <td>{{ $address->address }}</td>
        <td>{{ $address->label }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection
