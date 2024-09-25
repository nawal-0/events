@extends('layout')
@section('content')

<header>
    <nav class="bg-primary px-4 py-2.5">
        <div class="container mx-auto flex justify-between items-center">
            
            <a href="/home" class="font-bold text-white">Events System</a>
               
            <a href="/logout" class="font-medium text-white">Logout</a>
                   
        </div>
    </nav>
</header>

<!-- Modal toggle -->
<div class="flex justify-center mt-6">
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-primary hover:bg-primary-dark font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Add Event
</button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mx-6 mt-6">
    
    @foreach($events as $event)
    <div class="bg-gray-50 border border-gray-200 p-4 rounded">
        <h2 class="text-xl font-bold">{{ $event->title }}</h2>
        <p class="text-gray-600">{{ $event->description }}</p>
        
        <p class="text-gray-600 mt-4"><span class="font-semibold">Date:</span> {{ date('d-m-y', strtotime($event->date)) }}</p>
        <div class="flex flex-col md:flex-row md:justify-between space-y-2 md:space-y-0">
            <p class="text-gray-600"><span class="font-semibold">Start:</span> {{ date('H:i', strtotime($event->start_time)) }}</p>
            <p class="text-gray-600"><span class="font-semibold">End:</span> {{ date('H:i', strtotime($event->end_time)) }}</p>
        </div>

        <div class="flex items-center mt-4">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm0 0v6M9.5 9A2.5 2.5 0 0 1 12 6.5"/>
          </svg>
          <p class="text-gray-600">{{ $event->location }}</p>
        </div>

        <div class="flex justify-end">
            @if(auth()->user()->id == $event->user_id) 
            <button class="bg-gray-500 text-white mt-4 px-4 py-2 rounded" disabled>
                Creator
            </button>
            @elseif(auth()->user()->events->contains($event->id))
            <form action="/event/{{ $event->id }}/unregister" method="POST">
                @csrf
            <button class="bg-gray-500 text-white mt-4 px-4 py-2 rounded hover:bg-gray-800">Registered</button>
            </form>
            @else
            <form action="/event/{{ $event->id }}" method="POST">
                @csrf
                <button type="submit" class="bg-primary text-white rounded py-2 px-4 hover:bg-primary-dark mt-4">Sign Up</button>
            </form>
            @endif
        </div>  
    </div>
    @endforeach

</div>

  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New Event
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5" action="/event" method="POST">
                    @csrf
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title</label>
                          <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type event name" required="">
                        </div>
                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Description</label>
                          <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write description here" required=""></textarea>                    
                        </div>
                        <div class="col-span-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                            <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Time</label>
                            <input type="time" name="start_time" id="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Time</label>
                            <input type="time" name="end_time" id="end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type location" required="">
                        </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-primary-dark font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new event
                  </button>
              </form>
          </div>
      </div>
  </div> 
  

@endsection