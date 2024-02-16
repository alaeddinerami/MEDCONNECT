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

        <div class="px-6 pt-6 2xl:container">


            <section class="">
                <div class="py-10 sm:py-16 block lg:py-24 relative z-40">


                    <div class="flex flex-wrap justify-center gap-5">
                        @foreach ($doctors as $doctor)
                        <a href="{{ route('doctor.show', ['doctor' => $doctor]) }}" class="border">

                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg">
                                    <img class="rounded-t-lg" src="/storage/doctor2.jpg" alt="dfb" />
                                </div>
                                <div class="p-5">
                                    <p class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $doctor->user->name }}</p>
                                    <h5 class="text-base text-center text-gray-800 font-normal capitalize">Speciality:
                                        {{ $doctor->Specialite->namespecialite }}</h5>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>

        </div>
        </section>
    </div>
</div>
</div>
</body>

</html>
