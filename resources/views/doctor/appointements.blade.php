

    <!-- Sidebar -->
    
    <div class="flex flex-col lg:flex-row">

        <!-- Sidebar -->
        <x-doctor-side-bare></x-doctor-side-bare>
    
       
           
            <div class="lg:ml-4 lg:w-3/4">
                <p class="text-slate-500 my-4">Hello, here are your latest appointments</p>
            
        
                <div>
                  
                    <p class="font-bold mb-3 text-gray-700"><i class="far fa-sun"></i> Morning</p>
                    @foreach ($appointements as $appointment)
                    @if ($appointment->doctorID == Auth::user()->doctor->first()->id )
                        @if ($loop->index == 4)
                            <p class="font-bold mb-3 mt-6 text-gray-700"><i class="far fa-moon"></i> Evening</p>
                        @endif
            
                        <div id="task" class="flex justify-between items-center mb-2 
                            @if ($appointment->status == 0) border-l-green-600 bg-gradient-to-r from-green-100
                            @else border-l-red-600 bg-gradient-to-r from-green-100 
                            @endif
                            border py-3 px-2 transition-all ease-in duration-150">
            
                            <div class="inline-flex items-center space-x-2">
                                <i class="far fa-clock fa-lg"></i>
                                <div>{{ $appointment->date }} &nbsp;<span class="italic">{{ $appointment->bookingHour }}</span></div>
                            </div>
            
                            
                            <div>
                                @if ($appointment->status == 0)
                                    free
                                @else
                                    {{ $appointment->patient->user->name }}
                                  <a href="{{route('certificat.edit',['appointment' => $appointment->id])}}">reserved</a>  
                                @endif
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            
                <!-- Footer -->
                <p class="text-xs text-slate-500 text-center">{{ $appointment->date }} Appointments</p>
            </div>
            
    </div>
    