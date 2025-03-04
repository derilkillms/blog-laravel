<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
selamat datang di dashboard {{$user->name}}
