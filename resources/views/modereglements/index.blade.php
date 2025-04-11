@extends('lyaouts.app') 
@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-blue-600">Modes de Règlement</h1>
            <a href="{{ route('modereglements.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                <i class="bi bi-plus-lg mr-2"></i> Ajouter
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Mode de Règlement</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($modeReglements  as $modeReglement)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $modeReglement->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $modeReglement->mode_reglement }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('modereglements.edit', $modeReglement->id) }}" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    <i class="bi bi-pencil-square mr-1"></i> 
                                </a>
                                <form action="{{ route('modereglements.destroy', $modeReglement->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce mode ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center">
                                        <i class="bi bi-trash mr-1"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($modeReglements ->isEmpty())
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">Aucun mode de règlement trouvé.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

