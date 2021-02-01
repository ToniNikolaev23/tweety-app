@if(auth()->user()->isNot($user))
<form method="POST" action="/profiles/{{$user->username}}/follow">
    @csrf
 <button type="submit" class="bg-blue-500 rounded-full text-xs rounded-lg shadow py-2 px-4 text-white">
     {{auth()->user()->following($user) ? 'Unfollow me ' : 'Follow me'}}
 </button>
</form>
@endif