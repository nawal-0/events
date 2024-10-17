<header>
    <nav class="bg-primary px-4 py-2.5">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex space-x-4">
                <a href="/home" class="font-medium
                {{ request()->is('home') ? 'text-white border-b-2 border-white' : 'text-gray-300 hover:text-white hover:border-white hover:border-b-2'}}">
                 Home
                </a>

                <a href="/regevents" class="font-medium 
                {{ request()->is('regevents') ? 'text-white border-b-2 border-white' : 'text-gray-300 hover:text-white hover:border-white hover:border-b-2'}}">
                 Registered Events
                </a>
                 
                <a href="/myevents" class="font-medium 
                {{ request()->is('myevents') ? 'text-white border-b-2 border-white' : 'text-gray-300 hover:text-white hover:border-white hover:border-b-2'}}">
                 My Events
                </a>

            </div>
            <a href="/logout" class="font-medium text-white">Logout</a>
        </div>
    </nav>
</header>