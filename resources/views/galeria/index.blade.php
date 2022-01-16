@extends('template')

@section('contenido')
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">

        @foreach ($galerias as $imagen)
            <div class="w-full">
                <a class="" href="{{ url('galeria/'.$imagen->id) }}">
                    <img class="w-full h-72 lg:h-80 object-cover" src="{{ asset('storage').'/'.$imagen->image }}" />
                </a>
                <div class="flex mt-2">
                    <a href="{{ url('/galeria/'.$imagen->id.'/edit' ) }}" class="w-1/2 bg-green-400 text-center text-2xl py-2">Editar</a>
                    <form action="{{ url('/galeria/'.$imagen->id) }}" method="POST" class="w-1/2 flex justify-center items-center">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="w-full text-2xl bg-red-400 py-2" value="Eliminar">
                    </form>
                </div>
            </div>
        @endforeach 
    </div>
    <div class="flex justify-center mx-5 p-2">
        <div class="paginate">{{$galerias->links()}}</div>
    </div>
@endsection