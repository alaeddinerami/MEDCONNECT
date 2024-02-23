<div class="flex flex-col lg:flex-row">

    <!-- Sidebar -->
    <x-doctor-side-bare></x-doctor-side-bare>

   
       
        <div class="lg:ml-4 lg:w-3/4">
            <p class="text-slate-500 my-4">Certifecate</p>
    <div class="max-w-md mx-auto">
        <form action="{{route('certificat.store')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="numberOfDays">
                    Number of Days
                </label>
                <input name='nomberjr' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="numberOfDays" type="text" placeholder="Number of Days">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                    Date
                </label>
                <input value="{{$app->first()->date}}" name="date_consultation"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="date" type="text">
                <input value="{{$app->first()->patientID}}" name="patient_id"  class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="date" type="text">
            </div>
            <div class="flex items-center justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Generate Certificate
                </button>
            </div>
        </form>
    </div>
    