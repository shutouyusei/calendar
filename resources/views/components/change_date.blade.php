<form action="{{ route('dashboard')}}" method="POST">
    @csrf
    <input type="month" name="Mo" value='{{ $date }}'>
    <input type="submit" value='変更'>