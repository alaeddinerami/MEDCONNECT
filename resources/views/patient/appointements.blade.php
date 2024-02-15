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
    <div class="flex flex-col lg:flex-row">
        <aside
            class="ml-[-100%]  z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
            <div>
                <div class="-mx-6 px-6 py-4">

                </div>

                <div class="mt-8 text-center">
                    <img src="https://tailus.io/sources/blocks/stats-cards/preview/images/second_user.webp"
                        alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
                    <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ Auth::user()->name }}</h5>
                    <span class="hidden text-gray-400 lg:block">{{ Auth::user()->role }}</span>
                </div>

                <ul class="space-y-2 tracking-wide mt-8">

                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                    clip-rule="evenodd" />
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                    d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Favorite doctor</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('appointements.index') }}"
                            class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                    d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                    d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="group-hover:text-gray-700">specialities</span>
                        </a>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('logout') }}"
                class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
                @csrf
                <button type="submit" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="group-hover:text-gray-700">Logout</span>
                </button>
            </form>
        </aside>
        <form action="{{ route('appointements.update') }}" method="post" class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8 mb-10">
            @csrf
            @method('put')
            <h4 class="text-xl text-gray-900 font-bold">Appointements log</h4>
            <div class="relative px-4">
              <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
              <!-- start::Timeline item -->
              @foreach($appointements as $appointement)
              @if($appointement->status == 0)
              <div class="flex items-center w-full my-6 -ml-1.5">
                <div class="w-1/12 z-10">
                  <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                </div>
                <div class="w-11/12">
                  <input type="radio" id="appointement{{ $appointement->id }}" name="appointementID" value="{{ $appointement->id }}" class="hidden peer" required>
                  <label for="appointement{{ $appointement->id }}" class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-green-500 bg-green border border-green-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600  ">
                    <div class="block">
                      <div class="w-full text-lg font-semibold">{{ $appointement->bookingHour }}</div>
                      <div class="w-full">{{ $appointement->date }}</div>
                    </div>
                    <div>
                      <i class="fa-solid fa-heart-circle-check text-green-600"></i>
                    </div>
                  </label>
                </div>
                <input type="hidden" name="patientID" value="{{ Auth::user()->id }}">
              </div>
              <!-- end::Timeline item -->
              @else
              <!-- start::Timeline item -->
              <div class="flex items-center w-full my-6 -ml-1.5">
                <div class="w-1/12 z-10">
                  <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                </div>
                <div class="w-11/12">
    <input type="radio" id="appointement{{ $appointement->id }}" name="appointementID" value="{{ $appointement->id }}" class="hidden peer" disabled>
    <label for="appointement{{ $appointement->id }}" class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-red-600 bg-red border border-red-600 cursor-pointer peer-checked:border-red-600 peer-checked:text-red-600 hover:text-red-700 hover:bg-red-100  ">
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
            <button type="submit" class="p-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center text-indigo-200 hover:text-white bg-indigo-600 hover:bg-indigo-500">
              <i class="fa-regular fa-bookmark"></i>
              <span class="text-sm font-medium hidden md:block">Book</span>
            </button>
          </form>
      
        
    </div>
    <!-- end::Timeline item -->
</body>

</html>
