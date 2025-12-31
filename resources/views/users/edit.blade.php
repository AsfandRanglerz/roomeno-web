@extends('admin.layout.app')
@section('title', 'Edit User')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/user') }}">Back</a>

                <form id="edit_farmer" action="{{ route('user.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit User</h4>
                                <div class="row mx-0 px-4">

                                    <!-- Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                                placeholder="Enter your first name" required>
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Last Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="last_name">Last Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                                placeholder="Enter your last name" required>
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="email">Email <span style="color: red;">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $user->email) }}"
                                                placeholder="example@gmail.com" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="phone">Phone <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                                placeholder="Enter your phone" required>
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Country Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="country">Country <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('country') is-invalid @enderror"
                                                id="country" name="country" value="{{ old('country', $user->country) }}"
                                                placeholder="Enter your country" required>
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

									
									  <!-- IMAGE -->
										{{-- <div class="col-sm-6 pl-sm-0 pr-sm-3">
											<div class="form-group">
												<label for="image">Image <span>(Optional)</span></label>
												<input type="file" 
													class="form-control @error('image') is-invalid @enderror"
													id="image" 
													name="image" 
													accept="image/*">
												@error('image')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>
										</div> --}}

                                    <!-- Password Field (fixed) -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group position-relative">
                                            <label for="password">Password (Optional)</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" placeholder="Password">
                                            <span class="fa fa-eye toggle-password position-absolute"
                                                style="top: 42px; right: 15px; cursor: pointer;"></span>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Referral Code Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="referral_code">Referral Code</label>
                                            <input type="text"
                                                class="form-control @error('referral_code') is-invalid @enderror"
                                                id="referral_code" name="referral_code"
                                                value="{{ old('referral_code', $user->referral_code) }}"
                                                placeholder="Enter referral code">
                                            @error('referral_code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Submit Button -->
                                    <div class="card-footer text-center row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 btn-bg" id="submit">Save
                                                Changes</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@section('js')
    @if (session('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('.toggle-password').on('click', function() {
                const $passwordInput = $('#password');
                const $icon = $(this);

                if ($passwordInput.attr('type') === 'password') {
                    $passwordInput.attr('type', 'text');
                    $icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    $passwordInput.attr('type', 'password');
                    $icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Hide validation errors on focus
            $('input, select, textarea').on('focus', function() {
                const $feedback = $(this).parent().find('.invalid-feedback');
                if ($feedback.length) {
                    $feedback.hide();
                    $(this).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
