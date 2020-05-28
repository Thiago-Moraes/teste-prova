@extends('layouts.app')

@section('content')
<div id="app">
    <input type="text" v-model="variavel">
    {{ variavel }}
</div>
@endsection
