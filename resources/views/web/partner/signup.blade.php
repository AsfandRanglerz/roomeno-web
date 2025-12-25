<form method="POST" action="{{ url('partner/signup') }}">
@csrf

<input type="text" name="first_name" placeholder="First Name" required>
<input type="text" name="last_name" placeholder="Last Name" required>

<input type="email" name="email" placeholder="Email" required>
<input type="text" name="phone_number" placeholder="Phone Number" required>

<input type="text" name="company_name" placeholder="Company Name" required>
<textarea name="company_address" placeholder="Company Address" required></textarea>

<input type="password" name="password" placeholder="Password" required>
<input type="password" name="password_confirmation" placeholder="Confirm Password" required>

<button type="submit">Signup</button>
</form>
    