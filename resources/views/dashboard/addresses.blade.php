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

</div>
</div>
@endsection
