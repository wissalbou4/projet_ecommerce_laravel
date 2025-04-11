@extends('lyaouts.app') 
@section('content')

    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Modifier la Famille</h1>

        <form action="{{ route('familles.update', $famille->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="famille" class="block text-sm font-medium text-gray-700 mb-1">Nom de la famille</label>
                <input type="text" name="famille" id="famille" value="{{ old('famille', $famille->famille) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('famille') border-red-500 @enderror">
                @error('famille')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Changer l'image (optionnel)</label>
                <input type="file" name="image" id="image"
                       class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                @if ($famille->image)
                    <div class="mt-4">
                        <p class="text-sm text-gray-600 mb-1">Image actuelle :</p>
                        <img src="{{ asset('storage/' . $famille->image) }}" alt="{{ $famille->famille }}" class="w-24 h-24 object-cover rounded-full">
                    </div>
                @endif
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('familles.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Annuler</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Mettre à jour</button>
            </div>
        </form>
    </div>

@endsection

