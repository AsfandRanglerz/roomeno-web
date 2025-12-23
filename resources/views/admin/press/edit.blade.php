@extends('admin.layout.app')
@section('title', 'Press')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/press') }}">Back</a>

                <form id="edit_farmer" action="{{ route('press.update', $press->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Press</h4>
                                <div class="row mx-0 px-4">
                                    <!-- Description Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="description">Description <span style="color: red;">*</span></label>
                                            <textarea
                                                class="form-control @error('description') is-invalid @enderror"
                                                id="description"
                                                name="description"
                                                rows="3"
                                                placeholder="Enter Description">{{ old('description', $press->description) }}</textarea>

                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> 
                                      <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Image <span style="color: red;">*</span></label>
                                            <input type="file" name="image" class="form-control">
                                            <small text-muted>(Image should be of size 2MB)</small>
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if($press->image)
                                        <div class="ms-3">
                                            <img src="{{ asset($press->image) }}" 
                                                 alt="image" 
                                                 style="width: 80px; height: 80px; border: 1px solid #ddd;">
                                        </div>
                                    @endif
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
