@extends('layouts.master')

@section('title')
  Blog
@endsection

@section('pheader')
  Blog
@endsection

@section('content')
  @include('includes.blogcontent')
  @include('includes.waywf')
@endsection('content')

