<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-patient-sidebare></x-patient-sidebare>
<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
        <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Patient</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
        <form action="{{ route('appointements.update') }}" method="post"
            class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8 mb-10">
            @csrf
            @method('put')
            <h4 class="text-xl text-gray-900 font-bold">Appointements log</h4>
            <div class="relative px-4">
                <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
                <!-- start::Timeline item -->
                @foreach ($appointements as $appointement)
                    @if ($appointement->status == 0)
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <input type="radio" id="appointement{{ $appointement->id }}" name="appointementID"
                                    value="{{ $appointement->id }}" class="hidden peer" required>
                                <label for="appointement{{ $appointement->id }}"
                                    class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-green-500 bg-green border border-green-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600  ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ $appointement->bookingHour }}
                                        </div>
                                        <div class="w-full">{{ $appointement->date }}</div>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-heart-circle-check text-green-600"></i>
                                    </div>
                                </label>
                            </div>
                            {{-- @dd( Auth::user()->patient->first()->id) --}}
                            <input type="hidden" name="patientID" value="{{ Auth::user()->patient->first()->id }}">
                        </div>
                        <!-- end::Timeline item -->
                    @else
                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <input type="radio" id="appointement{{ $appointement->id }}" name="appointementID"
                                    value="{{ $appointement->id }}" class="hidden peer" disabled>
                                <label for="appointement{{ $appointement->id }}"
                                    class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-red-600 bg-red border border-red-600 cursor-pointer peer-checked:border-red-600 peer-checked:text-red-600 hover:text-red-700 hover:bg-red-100  ">
                                    <div class="block">
                                        <div class="text-lg font-semibold">{{ $appointement->bookingHour }}</div>
                                        <div>{{ $appointement->date }}</div>
                                    </div>
                                    <div class="text-red-500">
                                        Already Reserved
                                    </div>
                                    <div>
                                        <i class="far fa-heart-broken text-red-500"></i>
                                    </div>
                                </label>
                            </div>



                            <input type="hidden" name="patientID" value="{{ Auth::user()->id }}">
                        </div>
                    @endif
                @endforeach
                <!-- end::Timeline item -->
            </div>
            <button type="submit"
                class="p-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center text-indigo-200 hover:text-white bg-indigo-600 hover:bg-indigo-500">
                <i class="fa-regular fa-bookmark"></i>
                <span class="text-sm font-medium hidden md:block">Book</span>
            </button>
        </form>


    </div>
    <!-- end::Timeline item -->
    </body>

</html>
