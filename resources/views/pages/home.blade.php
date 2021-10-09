
@extends('master')

@section('slider')
    @include('pages.slider')
@endsection

@section('slider-hot')
    @include('pages.slider-hot')
@endsection

@section('content')
    {{-- @include('pages.blocks.block-new') --}}
    @include('pages.blocks.block-popular')
@endsection
