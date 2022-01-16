@extends('template')

@section('contenido')
    <img src="{{ asset('storage').'/'.$galeria->image }}" alt="">
    <h1>{{$galeria->name}}</h1>
    <p>{{$galeria->desc}}</p>
@endsection