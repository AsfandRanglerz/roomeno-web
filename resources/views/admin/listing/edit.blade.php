@extends('admin.layout.app')
@section('title', 'Edit User')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/listing') }}">Back</a>

                <form id="edit_farmer" action="{{ route('listing.update', $listing->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Listings</h4>
                                <div class="row mx-0 px-4">

                                     <!-- Customer Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                                id="customer_name" name="customer_name" value="{{ old('customer_name', $listing->customer_name) }}"
                                                placeholder="Enter first name" required>
                                            @error('customer_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Hotel Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="name">Hotel Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name', $listing->name) }}"
                                                placeholder="Enter first name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Board Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                                <div class="form-group">
                                                    <label for="board_name">Board Name <span style="color: red;">*</span></label>

                                                    <select name="board_name" id="board_name"
                                                        class="form-control @error('board_name') is-invalid @enderror" required>

                                                        @php
                                                            $boards = [
                                                                'Room Only',
                                                                'Bed and Breakfast',
                                                                'Half Board',
                                                                'Full Board',
                                                                'All Inclusive',
                                                                'B&B + dinner first night',
                                                            ];
                                                        @endphp

                                                        <option value="">Select Board</option>

                                                        @foreach ($boards as $board)
                                                            <option value="{{ $board }}"
                                                                {{ old('board_name', $listing->board_name) == $board ? 'selected' : '' }}>
                                                                {{ $board }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('board_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                    <!-- Check In Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="check_in">Check In <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control @error('check_in') is-invalid @enderror"
                                                id="check_in" name="check_in" value="{{ old('check_in', $listing->check_in) }}"
                                                placeholder="Enter check-in date" required>
                                            @error('check_in')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Check Out Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="check_out">Check Out <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control @error('check_out') is-invalid @enderror"
                                                id="check_out" name="check_out" value="{{ old('check_out', $listing->check_out) }}"
                                                placeholder="Enter check-out date" required>
                                            @error('check_out')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Number of People Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group">
                                        <label>People <span style="color: red;">*</span></label>

                                        <div class="form-control" id="peopleDropdown" style="cursor:pointer;">
                                            <span id="peopleText">
                                                {{ old('people_number', $listing->people_number ?? '1 adult') }}
                                            </span>
                                        </div>

                                        <input type="hidden" name="people_number" id="people_number"
                                            value="{{ old('people_number', $listing->people_number ?? '1 adult') }}">

                                        <div id="peopleMenu" class="card p-3" style="display:none; position:absolute; z-index:1000;">

                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span>Adults</span>
                                                <div>
                                                    <button type="button" onclick="changeCount('adult',-1)">-</button>
                                                    <span id="adultCount">1</span>
                                                    <button type="button" onclick="changeCount('adult',1)">+</button>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Children</span>
                                                <div>
                                                    <button type="button" onclick="changeCount('child',-1)">-</button>
                                                    <span id="childCount">0</span>
                                                    <button type="button" onclick="changeCount('child',1)">+</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                    <!-- First Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" name="first_name" value="{{ old('first_name', $listing->first_name) }}"
                                                placeholder="Enter first name" required>
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
                                                id="last_name" name="last_name" value="{{ old('last_name', $listing->last_name) }}"
                                                placeholder="Enter last name" required>
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Country Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="country">Country Code <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('country') is-invalid @enderror"
                                                id="country" name="country" value="{{ old('country', $listing->country) }}"
                                                placeholder="Enter country code" required>
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                                id="phone_number" name="phone_number" value="{{ old('phone_number', $listing->phone_number) }}"
                                                placeholder="Enter phone number" required>
                                            @error('phone_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="email">Email <span style="color: red;">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $listing->email) }}"
                                                placeholder="Enter email" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Place of Booking Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group">
                                        <label for="place_of_booking">Place of Booking <span style="color: red;">*</span></label>

                                        <select name="place_of_booking" id="place_of_booking"
                                            class="form-control @error('place_of_booking') is-invalid @enderror" required>

                                            @php
                                                $places = ['Booking', 'Priceline', 'Agoda', 'Expedia', 'Other'];
                                            @endphp

                                            <option value="">Select Platform</option>

                                            @foreach ($places as $place)
                                                <option value="{{ $place }}"
                                                    {{ old('place_of_booking', $listing->place_of_booking) == $place ? 'selected' : '' }}>
                                                    {{ $place }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('place_of_booking')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                    <!-- Confirmation No Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="confirm_no">Confirmation No <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('confirm_no') is-invalid @enderror"
                                                id="confirm_no" name="confirm_no" value="{{ old('confirm_no', $listing->confirm_no) }}"
                                                placeholder="Enter confirmation number" required>
                                            @error('confirm_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Asking Price Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="asking_price">Asking Price <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('asking_price') is-invalid @enderror"
                                                id="asking_price" name="asking_price" value="{{ old('asking_price', $listing->asking_price) }}"
                                                placeholder="Enter asking price" required>
                                            @error('asking_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Payment Type Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                    <div class="form-group">
                                        <label for="paid_type">Payment Type <span style="color: red;">*</span></label>

                                        <select name="paid_type" id="paid_type"
                                            class="form-control @error('paid_type') is-invalid @enderror" required>

                                            @php
                                                $payments = ['Roomeno Credits', 'PayPal'];
                                            @endphp

                                            <option value="">Select Payment Type</option>

                                            @foreach ($payments as $payment)
                                                <option value="{{ $payment }}"
                                                    {{ old('paid_type', $listing->paid_type) == $payment ? 'selected' : '' }}>
                                                    {{ $payment }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('paid_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                    <!-- Card Number Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="card_number">Card Number <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('card_number') is-invalid @enderror"
                                                id="card_number" name="card_number" value="{{ old('card_number', $listing->card_number) }}"
                                                placeholder="Enter card number" required>
                                            @error('card_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Cardholder Name Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="cardholder_name">Cardholder Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('cardholder_name') is-invalid @enderror"
                                                id="cardholder_name" name="cardholder_name" value="{{ old('cardholder_name', $listing->cardholder_name) }}"
                                                placeholder="Enter cardholder name" required>
                                            @error('cardholder_name')
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
    const menu = document.getElementById('peopleMenu');
    const text = document.getElementById('peopleText');
    const hidden = document.getElementById('people_number');

    document.getElementById('peopleDropdown').onclick = () => {
        menu.style.display = (menu.style.display === 'none' ? 'block' : 'none');
    };

    function changeCount(type, change){
        let adult = parseInt(document.getElementById('adultCount').innerText);
        let child = parseInt(document.getElementById('childCount').innerText);

        if(type === 'adult') adult = Math.max(1, adult + change);
        else child = Math.max(0, child + change);

        document.getElementById('adultCount').innerText = adult;
        document.getElementById('childCount').innerText = child;

        let value = `${adult} adult${adult>1?'s':''}`;
        if(child>0) value += `, ${child} child${child>1?'ren':''}`;

        text.innerText = value;
        hidden.value = value;
    }
</script>

@endsection
