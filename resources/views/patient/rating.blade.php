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


            <div class="h-screen w-full bg-gray-50  mx-auto ">


                <div class="h-fit rounded-xl bg-cyan-600 [50rem] flex justify-between items-baseline px-3 py-5">
                    <h1 class=" mx-auto text-white">Profile</h1>
                </div>
                <div class="bg-white h-fit w-full rounded-3xl flex flex-col justify-around items-center">
                    <div class="w-full h-1/2 flex mb-4 justify-between items-center px-3 pt-2">
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="text-gray-500 text-xs"></h1>
                            <span class="text-gray-600 text-sm"></span>
                        </div>
                        <div>
                            <img class="object-cover h-20 w-20 rounded-full"
                                src="https://images.unsplash.com/photo-1484608856193-968d2be4080e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80"
                                alt="" />
                        </div>
                        
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="text-gray-500 text-xs"></h1>
                            <h1 class="text-gray-600 text-sm"></h1>
                        </div>
                    </div>
                    <div class="flex items-center">
                      
                      <div class="flex items-center space-x-1">
                          @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $averageStars)
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M19.708 7.783a1 1 0 00-.933-.659l-6.263-.55L10.934.55a1 1 0 00-1.868 0l-1.578 6.024-6.263.55a1 1 0 00-.548 1.705l5.158 3.75-1.578 6.024a1 1 0 001.454 1.054l5.354-3.75 5.354 3.75a1 1 0 001.454-1.054l-1.578-6.024 5.158-3.75a1 1 0 00.268-1.046z" clip-rule="evenodd" />
                                  </svg>
                              @else
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M19.708 7.783a1 1 0 00-.933-.659l-6.263-.55L10.934.55a1 1 0 00-1.868 0l-1.578 6.024-6.263.55a1 1 0 00-.548 1.705l5.158 3.75-1.578 6.024a1 1 0 001.454 1.054l5.354-3.75 5.354 3.75a1 1 0 001.454-1.054l-1.578-6.024 5.158-3.75a1 1 0 00.268-1.046z" clip-rule="evenodd" />
                                  </svg>
                              @endif
                          @endfor
                      </div>
                  </div> 
                    <div class="w-full h-1/2 flex flex-col justify-center items-center gap-5">
                        <div>
                          <h1 class="text-gray-700 font-bold mt-3">{{ $doctor->user->name }}</h1>
                        <h1 class="text-gray-500 text-sm">{{ $doctor->Specialite->namespecialite }}</h1>
                      </div>
                        <a href="{{ route('appointements.index') }}" type="button"
                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 ">reservation</a>
                    </div>
                </div>
                
                <div class="flex w-full justify-end px-6">
                    <button onclick="showreview()"
                        class="rounded-lg bg-cyan-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">
                        Add comment
                    </button>
                </div>
                <div class=" min-h-screen bg-gray-100 py-10 ">
                  <div class="px-10">
                    <div class="flex flex-wrap  gap-4">
                      @foreach($reviews as $review)
                      @if( $review->doctorID == $doctor->id)
                      <div class=" bg-white  max-w-xl rounded-2xl px-10 py-2 shadow-lg hover:shadow-2xl transition duration-500">
                  
                            <div class="flex justify-between items-center">
                                <div class="mt-4 flex items-center space-x-4 py-3">
                                    <div class="">
                                        <img class="w-12 h-12 rounded-full"
                                            src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80"
                                            alt="" />
                                    </div>
                                    <div class="text-sm font-semibold">{{$patient->user->name}} • </div>
                                </div>

                            </div>
                            <div class="">
                              <div class="flex mt-2">
                                @for ($i = 0; $i < $review->starCount; $i++)
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400"
                                      viewBox="0 0 20 20" fill="currentColor">
                                      <path
                                          d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                  </svg>
                                  @endfor
                              </div>
                                <h3 class=" text-base text-gray-600 font-semibold hover:underline cursor-pointer">
                                  {{$review->comment}}</h3>
                                <p class="mt-4 text-md text-gray-600"></p>

                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ///////////////////////////////////////form comment////////////////////////// --}}
<form
class="hidden bg-cyan-200 rounded-xl absolute top-[40%] left-[40%] transform -translate-x-[40%] -translate-y-[40%] z-50 justify-center items-center w-[33rem] h-[20rem] sm:fixed sm:top-[25%] sm:left-[32%] sm:transform-none sm:-translate-x-[30%] sm:-translate-y-[30%]"
    action="{{route('review.store')}}" method="post" id="rev-form">
    <input type="hidden" name="doctorID" id="doctor_id" value="{{ $doctor->id }}">
    <input type="hidden" name="patientID" id="patient_id" value="{{ $patient->id }}">

    @csrf
    <div class="grid gap-4 mb-4 sm:grid-cols-2">

      
        <div>
            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 ">Comment</label>
            <input type="text" name="comment"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
        </div>
        <div>
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 ">Rating</label>
            <div class="flex items-center space-x-1">
                <input type="radio" id="star5" name="starCount" value="1" class="hidden" />
                <label for="star5" class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                    onclick="handleStarClick(this)">⭐️</label>
                <input type="radio" id="star4" name="starCount" value="2" class="hidden" />
                <label for="star4" class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                    onclick="handleStarClick(this)">⭐️</label>
                <input type="radio" id="star3" name="starCount" value="3" class="hidden" />
                <label for="star3" class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                    onclick="handleStarClick(this)">⭐️</label>
                <input type="radio" id="star2" name="starCount" value="4" class="hidden" />
                <label for="star2" class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                    onclick="handleStarClick(this)">⭐️</label>
                <input type="radio" id="star1" name="starCount" value="5" class="hidden" />
                <label for="star1" class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                    onclick="handleStarClick(this)">⭐️</label>
                    
            </div>
        </div>

        <button type="submit"
            class="text-white inline-flex items-center bg-cyan-800 hover:bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Send Review
        </button>
        <button type="button" onclick="hidereview()"
            class="text-white inline-flex items-center hover:bg-cyan-800 bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            <svg class="w-5 mt-1 mr-1 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 18 6m0 12L6 6" />
            </svg>cancel</button>
    </div>
</form>
<style>
  .starr.selected {
      opacity: 1;
      /* Change opacity to 1 when selected */
      font-size: 2rem;
      /* Adjust text size as desired when selected */
  }
</style>
<script>
    function showreview() {

        document.getElementById('rev-form').classList.remove('hidden');
        document.getElementById('rev-form').classList.add('flex');
        document.getElementById('bg').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }


    function hidereview() {
        document.getElementById('rev-form').classList.add('hidden');
        document.getElementById('rev-form').classList.remove('flex');
        document.getElementById('bg').classList.add('hidden');
    }

    function handleStarClick(starr) {
            var stars = document.querySelectorAll('.starr');
            var clickedIndex = Array.from(stars).indexOf(starr);

            // Loop through stars
            for (var i = 0; i <= clickedIndex; i++) {
                stars[i].classList.add('selected');
            }
        }
        
</script>
</body>

</html>
