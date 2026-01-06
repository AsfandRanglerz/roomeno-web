@extends('admin.layout.app')
@section('title', 'Edit Commission')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <a class="btn btn-primary mb-3" href="{{ url('admin/commission') }}">Back</a>

                <form id="edit_farmer" action="{{ route('commissions.update', $commision->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Correct method for updating -->

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <h4 class="text-center my-4">Edit Commission</h4>
                                <div class="row mx-0 px-4">
                                    <!-- Description Field -->
                                    <div class="col-sm-6 pl-sm-0 pr-sm-3">
                                        <div class="form-group">
                                            <label for="commision">Commission <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control @error('commision') is-invalid @enderror"
                                                id="commision" name="commision" value="{{ old('commision', $commision->commision) }}"
                                                placeholder="Enter Commission">
                                            @error('commision')
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
