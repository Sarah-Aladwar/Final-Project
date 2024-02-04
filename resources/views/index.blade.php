@extends('layouts.alt')

@section('title')
  Home
@endsection

@section('content')

  @include('includes.rentacar')

  @include('includes.howitworks')

  @include('includes.meetthemnow')

  @include('includes.carlistings', ['includePagination' => false])

  @include('includes.features')

  @include('includes.testimonials', ['bgcolor' => 'bg-light'])

  <!-- what are you waiting for -->
  @include('includes.waywf')

@endsection('content')

