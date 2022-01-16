@extends('template')

@section('contenido')
    
    <form action="{{ url('/galeria') }}" method="POST" class="w-3/4 border-4 border-gray-100 my-4 p-2 rounded-md mx-auto" enctype="multipart/form-data">
        @include('galeria.form')
    </form>
@endsection