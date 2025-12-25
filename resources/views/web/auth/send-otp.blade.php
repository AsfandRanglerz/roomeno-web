
<div class="container mt-5">

    <h2>Send OTP</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('send.otp') }}" method="POST">
        @csrf

        <label>Email:</label>
        <input type="email" class="form-control" name="email" required>

        <button class="btn btn-primary mt-3">Send OTP</button>
    </form>
</div>
