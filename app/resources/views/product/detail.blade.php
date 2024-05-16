@extends('layout.app')
@push('styles')
    <link href="{{ asset('/css/product_detail.css') }}" rel="stylesheet">
@endpush
@section('title', 'Товар номер')

@section('content')
    <product-detail
        props-product-id="{{ $product}}"
    ></product-detail>
@endsection
