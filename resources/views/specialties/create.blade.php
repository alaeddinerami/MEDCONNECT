<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col lg:flex-row">
                    <!-- Sidebar -->
                    <x-sidebar></x-sidebar>

                    <!-- Main Content -->
                    <div class="lg:w-3/4 p-4">
                        <!-- Create Form -->
                        <div class="p-6 bg-white border-b border-gray-200 mb-8">
                            <h2 class="font-semibold text-xl text-gray-800 mb-4">Create New Specialty</h2>
                            @if (session('addsuccess'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Success!</strong>
                                    <span class="block sm:inline">{{ session('addsuccess') }}</span>
                                </div>
                            @endif
                            <form action="{{ route('specialties.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="namespecialite"
                                        class="block text-sm font-medium text-gray-700">Name:</label>
                                    <input type="text" name="namespecialite" id="name"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                        required autofocus />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit"
                                        class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Create
                                        Specialty</button>
                                </div>
                            </form>
                        </div>

                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif
                        <!-- Specialties List -->
                        <div class="bg-white border-b border-gray-200">
                            <h2 class="font-semibold text-xl text-gray-800 p-6">Specialties</h2>
                            <div class="px-6 py-4">
                               
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th
                                                class="px-8 py-4 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($specialties as $specialty)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $specialty->id }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $specialty->namespecialite }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button href="" class="text-teal-500 hover:text-teal-700"
                                                        onclick="openEditModal({{ $specialty->id }},'{{ $specialty->namespecialite }}')">Edit</button>
                                                    <form action="{{ route('specialties.destroy', $specialty->id) }}"
                                                        method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-500 hover:text-red-700 ml-4">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                                    <div
                                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                            aria-hidden="true">&#8203;</span>
                                        <div
                                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                           
                                            <div class="p-6">
                                                <h2 class="text-lg font-semibold mb-4">Edit Specialty</h2>
                                               
                                                <form action="{{ route('specialties.update', '') }}" method="POST"
                                                    id="editForm">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="editSpecialtyId" id="editSpecialtyId">
                                                    <div class="mb-4">
                                                        <label for="editName"
                                                            class="block text-sm font-medium text-gray-700">Name:</label>
                                                        <input type="text" name="editName" id="editName"
                                                            class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                                            required autofocus />
                                                    </div>
                                                   
                                                    <div class="flex items-center justify-end mt-4">
                                                        <button type="submit"
                                                            class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Update
                                                            Specialty</button>
                                                        <button type="button" onclick="closeEditModal()"
                                                            class="bg-gray-300 text-gray-800 ml-4 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Function to open the edit modal
    function openEditModal(id, name) {
        document.getElementById('editSpecialtyId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editForm').action = "{{ route('specialties.update', '') }}" + "/" + id;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
