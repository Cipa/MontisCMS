@extends('layouts.backend')

@section('content')

@php
    // dd($config);
@endphp

<Backend :config="{{ json_encode($config) }}"></Backend>

@endsection
