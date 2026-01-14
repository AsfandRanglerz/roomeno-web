@extends('admin.layout.app')
@section('title', 'Edit Hotel')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <a class="btn btn-primary mb-3" href="{{ route('hotels.index') }}">Back</a>

            <form id="edit_hotel" action="{{ route('hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') {{-- Important for PUT request --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="text-center my-4">Edit Hotel</h4>
                            <div class="row mx-0 px-4">

                                <!-- Hotel Name -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Hotel Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ $hotel->name }}" placeholder="Enter hotel name" required autofocus>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Slug -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slug">Slug <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                               value="{{ $hotel->slug }}" placeholder="Slug" readonly>
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="location">Location <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="location" name="location"
                                               value="{{ $hotel->location }}" placeholder="Enter location" required>
                                        @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city">City <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city"
                                               value="{{ $hotel->city }}" placeholder="Enter city" required>
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="country">Country <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="country" name="country"
                                               value="{{ $hotel->country }}" placeholder="Enter country" required>
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Images -->
                                <div class="col-sm-12 w-100">
                                    <div class="form-group">
                                        <label for="images">Hotel Images</label>
                                        <input type="file" class="form-control @error('images') is-invalid @enderror"
                                               name="images[]" multiple>
                                        <small class="text-danger">Note: Maximum image size allowed is 2MB each</small>
                                        @error('images')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        @if ($hotel->images)
                                            @foreach (json_decode($hotel->images) as $img)
                                                <img src="{{ asset('public/' . $img) }}" alt="Hotel Image"
                                                     style="width: 100px; height: 100px; margin:5px;border:1px solid #ddd;">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description <span style="color: red;">*</span></label>
                                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ $hotel->description }}</textarea>
                                        <div id="description-error" class="text-danger mt-2" style="display:none;"></div>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
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
<script>
    $(document).ready(function() {

        // CKEditor Init
        if (document.getElementById('description')) {
            CKEDITOR.replace('description');

            CKEDITOR.instances['description'].on('focus', function() {
                $('#description-error').hide();
            });
        }

        // Slug Generator
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-') 
                .replace(/[^\w\-]+/g, '') 
                .replace(/\-\-+/g, '-') 
                .replace(/^-+/, '') 
                .replace(/-+$/, ''); 
        }

        $('#name').on('input', function() {
            $('#slug').val(slugify($(this).val()));
        });

        // CKEditor Validation on submit
        $('#edit_hotel').on('submit', function(e) {
            let content = CKEDITOR.instances['description'].getData().trim();
            let plainText = $('<div>').html(content).text().trim();
            let onlySymbolsOrEmpty = plainText === '' || /^[\s\W_]+$/.test(plainText);

            if (onlySymbolsOrEmpty) {
                e.preventDefault();
                $('#description-error').text('The description field is required.').show();
                CKEDITOR.instances['description'].focus();
                return false;
            }
        });

    });
</script>
@endsection
