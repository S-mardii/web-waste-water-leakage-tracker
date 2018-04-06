@extends('layouts.master')

@section('body')
    <div class="container">
        <h1>Disclaimer</h1>
        <p>
            {{ $aboutUs['disclaimer'] }}
        </p>
    </div>
@endsection