@extends('layouts.app')

@section('content')
    @php
        if (request()->has('type')) {
            $type = true;
        } else {
            $type = false;
        }
    @endphp
    <plans :user="{{ auth()->user() }}" student="{{ $type }}"></plans>
@endsection