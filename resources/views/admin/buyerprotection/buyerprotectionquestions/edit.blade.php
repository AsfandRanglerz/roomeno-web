@extends('admin.layout.app')
@section('title', 'Buyer Protection Questions')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/buyer-protection-questions') }}">Back</a>

                <form id="edit_farmer" action="{{ route('protectionquestions.update', $questions->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Buyer Protection Questions</h4>
                                <div class="row mx-0 px-4">
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group mb-2">
                                            <label>Image <span style="color: red;">*</span></label>
                                            <input type="file" name="image" class="form-control">
                                            <small text-muted>(Image should be of size 2MB)</small>
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if($questions->image)
                                        <div class="ms-3">
                                            <img src="{{ asset($questions->image) }}" 
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
