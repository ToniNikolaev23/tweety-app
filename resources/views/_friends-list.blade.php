<div class="bg-gray-200 rounded-lg py-4 px-6">
<h3 class="font-bold text-lg mb-4">Friends</h3>
<ul>
    @forelse (auth()->user()->follows as $friend)
    <li class="mb-4">
        <div>
           <a href="{{route('profile', $friend->username)}}" class="flex items-center text-sm">
            <img src="https://i.pravatar.cc/40" alt="" class="rounded-full mr-2" style="width:50px;">
            {{$friend->name}}
           </a>
        </div>
    </li>
    @empty 
    <p>No friends!</p>
    @endforelse
    
</ul>
</div>