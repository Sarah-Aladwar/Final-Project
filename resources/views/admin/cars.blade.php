@extends('admin.layouts.list')

{{--
@php
  use Carbon\Carbon;
@endphp  
--}}

@section('pagetitle')
  Cars
@endsection

@section('content')
  @include('admin.includes.carscontent')
@endsection('content')
