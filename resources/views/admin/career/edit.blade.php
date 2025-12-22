@extends('admin.layout.app')
@section('title', 'Career')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/career') }}">Back</a>

                <form id="edit_farmer" action="{{ route('career.update', $career->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Career</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 d-flex align-items-center pl-sm-0 pr-sm-3">
                                        <!-- Description Field -->
                                        <div class="form-group flex-grow-1">
                                            <label for="description_one">Description <span style="color: red;">*</span></label>
                                            <textarea
                                                class="form-control @error('description_one') is-invalid @enderror"
                                                id="description_one"
                                                name="description_one"
                                                rows="3"
                                                placeholder="Enter Description">{{ old('description_one', $career->description_one) }}</textarea>
                                            @error('description_one')
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
