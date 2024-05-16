@extends('layout.app')
@push('styles')
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">
@endpush
@section('title', 'Товар номер')

@section('content')
    <product-card></product-card>
@endsection
