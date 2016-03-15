@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
   @include('store.featured_recommended')
@stop