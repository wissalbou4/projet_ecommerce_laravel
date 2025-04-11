@extends('lyaouts.app') 
@section('content')

    <div class="w-full max-w-xl p-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Modifier la Marque</h1>

        <form action="{{ route('marques.update', $marque->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nom de la Marque -->
            <div>
                <label for="marque" class="block text-lg font-semibold text-gray-700 mb-2">Nom de la Marque</label>
                <input type="text" name="marque" id="marque" value="{{ old('marque', $marque->marque) }}"
                       class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Entrez le nom de la marque" required>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">Changer l'image</label>
                <input type="file" name="image" id="image"
                       class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                @if ($marque->image)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-1">Image actuelle :</p>
                        <img src="{{ asset('storage/' . $marque->image) }}" alt="Image de la marque"
                             class="w-20 h-20 object-cover rounded border">
                    </div>
                @endif
            </div>

            <!-- Bouton -->
            <div>
                <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white text-lg rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 focus:outline-none">
                    <i class="bi bi-check-circle mr-2"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>

@endsection