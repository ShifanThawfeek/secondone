@extends('layouts.app')

@section('content')
    <links user="{{ getUserInfos() }}" domain="{{ url()->current() }}"></links>
@endsection