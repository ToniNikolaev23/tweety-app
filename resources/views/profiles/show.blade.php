<x-app>
   <header class="mb-6 relative">
       <img class="mb-2" src="/images/default-profile-banner.jpg" alt="">

       <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
        <div>
            <a href="#" class="rounded-full border border-gray-300 py-2 px-2 text-black text-xs">Edit Profile</a>
            <a href="#" class="bg-blue-500 rounded-full text-xs rounded-lg shadow py-2 px-4 text-white">Follow me</a>
        </div>
       </div>
       <p class="text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto accusamus aperiam aspernatur eaque excepturi. A aliquam perferendis quaerat libero nulla sint! Optio facilis impedit quidem voluptates quia, numquam suscipit! Cupiditate?</p>
       <img src="{{$user->avatar}}" 
       alt="" 
       class="rounded-full mr-2 absolute"
       style="width:150px; left:calc(50% - 75px); top:138px;">

       
   </header>

   

   @include('_timeline', [
       'tweets' => $user->tweets
   ])
</x-app>