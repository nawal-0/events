@extends('layout')
@section('content')

<header>
    <nav class="bg-primary px-4 py-2.5">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex space-x-4">
                <a href="/home" class="font-medium text-white">Home</a>
                <a href="/myevents" class="font-medium text-white">Registered Events</a>
            </div>
            <a href="/logout" class="font-medium text-white">Logout</a>
        </div>
    </nav>
</header>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mx-6 mt-6">
    
    @forelse($events as $event)
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
            <form action="/event/{{ $event->id }}/unregister" method="POST">
                @csrf
            <button class="bg-gray-500 text-white mt-4 px-4 py-2 rounded hover:bg-gray-800">Registered</button>
            </form>
        </div>  
    </div>
    @empty
    
    <h2 class="text-xl font-bold">No events found</h2>
    
        
    @endforelse

</div>



@endsection