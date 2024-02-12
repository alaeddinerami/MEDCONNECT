<div class="lg:w-1/4 bg-gray-800 text-gray-100">
    <div class="p-4">
        <h3 class="text-lg font-semibold mb-4">Menu</h3>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('medicines.index') }}" class="block px-4 py-2 rounded transition duration-300 ease-in-out hover:bg-gray-700">Medicine</a>
            </li>
            <li>
                <a href="{{ route('specialties.index') }}" class="block px-4 py-2 rounded transition duration-300 ease-in-out hover:bg-gray-700">Specialties</a>
            </li>
            <li>
                <x-logout></x-logout>
            </li>
        </ul>
    </div>
</div>