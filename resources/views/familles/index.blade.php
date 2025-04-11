@extends('lyaouts.app') 
@section('content')

    <div class="max-w-7xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Liste des Familles</h1>
            <a href="{{ route('familles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 shadow">
                <i class="bi bi-plus-lg mr-2"></i> Ajouter une famille
            </a>
        </div>

        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Famille</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Image</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($familles as $famille)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $famille->famille }}</td>
                            <td class="px-6 py-4 text-sm">
                                <!-- Vérifier si l'image existe et l'afficher -->
                                @if ($famille->image)
                                    <img src="{{ asset('storage/' . $famille->image) }}" alt="Image de la famille" class="w-16 h-16 object-cover rounded-full">
                                @else
                                    <span>Aucune image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('familles.edit', $famille) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                    <i class="bi bi-pencil-square mr-1"></i> 
                                </a>
                                <form action="{{ route('familles.destroy', $famille) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette famille ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800">
                                        <i class="bi bi-trash mr-1"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
