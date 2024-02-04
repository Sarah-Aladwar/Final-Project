@extends('admin.layouts.list')

@php
  use Carbon\Carbon;
@endphp

@section('pagetitle')
  Trashed Testimonials
@endsection

@section('content')
  @include('admin.includes.trashedcarcontent')
@endsection('content')
