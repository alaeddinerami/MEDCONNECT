<!-- resources/views/dashboard.blade.php -->

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
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                            <div>
                                Welcome, {{ Auth::user()->name }}!
                            </div>

                            <div class="mt-8 text-2xl">
                                This is your dashboard.
                            </div>

                            <!-- Replace this with your dashboard content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
