@extends('lyaouts.app') 
@section('content')

    <div class="max-w-5xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600">Liste des Unités</h1>
            <a href="{{ route('unites.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="bi bi-plus-circle mr-2"></i> Ajouter une unité
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Unité</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach ($unites as $unite)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $unite->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $unite->unite }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('unites.edit', $unite->id) }}" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    <i class="bi bi-pencil-square mr-1"></i> 
                                </a>
                                <form action="{{ route('unites.destroy', $unite->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette unité ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center">
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

