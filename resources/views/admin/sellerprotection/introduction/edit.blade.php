@extends('admin.layout.app')
@section('title', 'Edit Introduction')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/seller-protection-intro') }}">Back</a>

                <form id="edit_farmer" action="{{ route('sellerprotectionintro.update', $intros->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Introduction</h4>
                                <div class="row mx-0 px-4">

                                    <!-- Title Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="title">Title <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ old('title', $intros->title) }}"
                                                placeholder="Enter Title">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-sm-6 d-flex align-items-center pl-sm-0 pr-sm-3">
                                        <!-- Input to Upload New Image -->
                                        <div class="flex-grow-1">
                                            <div class="form-group mb-2">
                                                <label>Image <span style="color: red;">*</span></label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                <small text-muted>(Image should be of size 2MB)</small>
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <!-- Display Existing Image -->
                                        @if($intros->image)
                                            <div class="ms-3">
                                                <img src="{{ asset($intros->image) }}" 
                                                     alt="image" 
                                                     style="width: 80px; height: 80px; margin-left:20px;border: 1px solid #ddd;">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Description Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="description">Description <span style="color: red;">*</span></label>
                                            <textarea
                                                class="form-control @error('description') is-invalid @enderror"
                                                id="description"
                                                name="description"
                                                rows="3"
                                                placeholder="Enter Description">{{ old('description', $intros->description) }}</textarea>

                                            @error('description')
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
@endsection
