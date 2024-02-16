<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-patient-sidebare></x-patient-sidebare>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Patient</h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </div>

            <div class="px-6 pt-6 2xl:container">
                
                    
                    <section class="">
                        <div class="py-10 sm:py-16 block lg:py-24 relative z-40">
                            <div class="mx-auto h-full px-4 pb-20 md:pb-10 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
                                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
                                    <div class="max-w-xl mx-auto text-center">
                                        <div class="inline-flex px-4 py-1.5 mx-auto rounded-full">
                                            <p class="text-4xl font-semibold tracking-widest text-g uppercase">SPECIALITIES:</p>
                                        </div>
                                        @foreach ($specialties as $specialty)                                               
                                        <div class=" mt-12">
                                            <a href="{{route('patient.explore', ['specialite' => $specialty])}}" class="inline-block w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300 ease-in-out">
                                                <div class="py-2 px-9 relative flex justify-center items-center">
                                                    <h3 class="text-lg font-bold text-black group-hover:text-white">{{$specialty->namespecialite}}</h3>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    
                    
                    
                </div>
            </div>
        </div>

</body>

</html>
