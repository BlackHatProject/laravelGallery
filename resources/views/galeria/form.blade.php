@csrf
<div class="w-full">
    <h1 class="text-4xl m-4 ">Guardar imagen</h1>
</div>
<div class="flex">
<div class="p-2 w-1/2">
    <input type="text" class="border-b-4 border-gray-500 my-4 p-2 w-full" name="name" placeholder="Nombre" value="{{ isset($galeria->name)?$galeria->name:'' }}">
    <input type="file" class="border-b-4 border-gray-500 p-2 w-full" name="image">
    @if (isset($galeria->image))
        <img src="asset('storage').'/'.$galeria->image" width="100">
    @endif
</div>
<div class="p-2 w-1/2">
    <textarea class=" w-full h-full border-b-4 border-gray-500 p-2" name="desc" placeholder="Descripcion">{{ isset($galeria->desc)?$galeria->desc:'' }}</textarea>
</div>
</div>
<input type="submit" value="Enviar" class="py-2 px-4 border-4 border-gray-100 m-2">