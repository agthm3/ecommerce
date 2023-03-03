<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p>Name : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Role : {{ $user->is_admin ? 'Admin' : 'User' }}</p>
    <form action="{{ route('edit_profile', $user) }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $user->name }}">
        <input type="password" name="password">
        <input type="password" name="password_confirmation">

        <button type="submit">Change Profile</button>
    </form>
</body>

</html>
