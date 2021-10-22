@extends('layouts.bootstrap')

@section('content')
    <h1>Cancelation feedback</h1>
    <p><b>Reason: </b> {{ $data['reason'] }}</p>
    <br />
    <p><b>Feedback: </b> {{ $data['feedback'] }}</p>
@endsection