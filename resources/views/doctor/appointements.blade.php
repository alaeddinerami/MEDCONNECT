<div class="flex flex-col lg:flex-row">

    <!-- Sidebar -->
    <x-doctor-side-bare></x-doctor-side-bare>
    <p class="text-slate-500 my-4">Hello, here are your latest appointements</p>
    <div>
        <p class="font-bold mb-3 text-gray-700"><span><i class="fa-regular fa-sun "></i></span> Morning</p>
        @php $i = 0 @endphp
        @foreach ($appointements as $appointement)
            @php $i++ @endphp
            @if ($i == 5)
                <p class="font-bold mb-3 mt-6 text-gray-700"><span><i class="fa-regular fa-moon"></i></span> Evening</p>
            @endif
            @if ($appointement->status == 0)
                <div id="task"
                    class="flex justify-between items-center mb-2 border-gray-600 py-3 px-2 border-l-4 border-l-gray-600 bg-gradient-to-r from-gray-100 to-transparent hover:border-red-600 hover:from-red-200 transition-all ease-in duration-150">
                    <div class="inline-flex items-center space-x-2">
                        <div>
                            <i class="fa-regular fa-clock fa-lg"></i>
                        </div>
                        <div>{{ $appointement->date }}<span class=" italic">{{ $appointement->bookingHour }}</span>
                        </div>
                    </div>
                    <div>free</div>
                </div>
            @else
                <div id="task"
                    class="flex justify-between items-center mb-2 border-green-600 py-3 px-2 border-l-4 border-l-green-600 bg-gradient-to-r from-green-100 to-transparent hover:border-red-600 hover:from-red-200 transition-all ease-in duration-150">
                    <div class="inline-flex items-center space-x-2">
                        <div>
                            <i class="fa-regular fa-clock fa-lg"></i>
                        </div>
                        <div>{{ $appointement->date }}<span class=" italic">{{ $appointement->bookingHour }}</span>
                        </div>
                    </div>
                    <div>{{ $appointement->patient->user->name }}</div>
                    <div>reserved</div>
                </div>
            @endif
        @endforeach
    </div>
    <p class="text-xs text-slate-500 text-center">{{ $appointement->date }} Appointements</p>
</div>

