@extends('lyaouts.app') 
@section('content')

    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Liste des Marques</h1>
            <a href="{{ route('marques.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 shadow">
                <i class="bi bi-plus-lg mr-2"></i> Ajouter une Marque
            </a>
        </div>

        <!-- Table Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nom de la Marque</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Image</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($marques as $marque)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $marque->marque }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if ($marque->image)
                                    <img src="{{ asset('storage/' . $marque->image) }}" alt="Image de la marque" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span>Aucune image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('marques.edit', $marque) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                    <i class="bi bi-pencil-square mr-1"></i> 
                                </a>
                                <form action="{{ route('marques.destroy', $marque) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette marque ?')">
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
