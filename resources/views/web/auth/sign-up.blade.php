<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>

<h2>User Sign Up</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('signup.store') }}" method="POST">
    @csrf

    <label>First Name</label><br>
    <input type="text" name="first_name" value="{{ old('first_name') }}" required><br><br>

    <label>Last Name</label><br>
    <input type="text" name="last_name" value="{{ old('last_name') }}" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br>
    <label>Confirm_Password</label><br>
    <input type="password" name="password_confirmation" required><br><br>


    <button type="submit">Sign Up</button>
</form>

</body>
</html>
