@extends('admin.layouts.list')

@php
  use Carbon\Carbon;
@endphp

@section('pagetitle')
  Users
@endsection

@section('content')
  @include('admin.includes.userscontent')
@endsection('content') 
