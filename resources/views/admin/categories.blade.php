@extends('admin.layouts.list')

@section('pagetitle')
  Categories
@endsection

@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@section('content')
  @include('admin.includes.categoriescontent')
@endsection('content')
