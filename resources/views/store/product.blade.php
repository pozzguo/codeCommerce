@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
   @include('store.product_detail')
@stop