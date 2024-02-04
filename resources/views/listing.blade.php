@extends('layouts.master')

@section('title')
  Listings
@endsection

@section('pheader')
  Listings
@endsection

@section('content')
  @include('includes.carlistings',  ['includePagination' => true])
  @include('includes.testimonials', ['bgcolor' => ''])
  @include('includes.waywf')
@endsection('content')