@extends('layouts.alt')

@php
  use Carbon\Carbon;
@endphp

@section('title')
  {{ $car->title }}
@endsection

@section('content')
  @include('includes.singlecontent')
@endsection('content')

