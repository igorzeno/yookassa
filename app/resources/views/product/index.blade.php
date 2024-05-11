@extends('layout.app')
@push('styles')
    <link href="{{ asset('/css/product.css') }}" rel="stylesheet">
@endpush
@section('title', 'Список продуктов')

@section('content')
{{--    @php--}}
{{--    if(!empty($_REQUEST)){--}}
{{--         var_dump($_REQUEST);--}}
{{--    }--}}
{{--    @endphp--}}
    {{--    @include('partials.header')--}}
    <product-index ref="foo"></product-index>
@endsection
