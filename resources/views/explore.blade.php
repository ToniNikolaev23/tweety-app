<x-app>
    <div>
        @foreach ($users as $user)
            <div class="flex items-center mb-5">
                <img src="{{$user->avatar}}" alt="{{$user->name}}" 
                style="width:60px;"
                class="mr-4 rounded">

                <div>
                    <h4 class="font-bold"><a href="{{route('profile',$user->username)}}">{{$user->username}}</a></h4>
                </div>
            </div>
           
        @endforeach

        {{$users->links()}}
    </div>
</x-app>