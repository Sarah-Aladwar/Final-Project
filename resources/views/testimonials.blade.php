@extends('layouts.master')

@section('title')
  Testimonials
@endsection

@section('pheader')
  Testimonials
@endsection

@section('content')
  @include('includes.testimonials', ['bgcolor' => 'bg-light'])
  @include('includes.waywf')
@endsection('content')