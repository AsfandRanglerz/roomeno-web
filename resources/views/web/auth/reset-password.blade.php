<div class="container mt-5">

    <h2>Set New Password</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reset.password.submit') }}" method="POST">
        @csrf

        <label>New Password:</label>
        <input type="password" class="form-control" name="password" required>

        <label class="mt-3">Confirm Password:</label>
        <input type="password" class="form-control" name="password_confirmation" required>

        <input type="hidden" name="otp_token" value="{{ $otp_token }}">

        <button class="btn btn-primary mt-3">Update Password</button>
    </form>
</div>
