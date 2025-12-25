
<div class="container mt-5">

    <h2>Verify OTP</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('verify.otp') }}" method="POST">
        @csrf

        <label>Enter OTP:</label>
        <input type="text" class="form-control" name="otp" required>

        <input type="hidden" name="otp_token" value="{{ $otpUser->otp_token }}">

        <button class="btn btn-success mt-3">Verify OTP</button>
    </form>

    <form action="{{ route('resend.otp') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="otp_token" value="{{ $otpUser->otp_token }}">

        <button class="btn btn-warning">Resend OTP</button>
    </form>

</div>
