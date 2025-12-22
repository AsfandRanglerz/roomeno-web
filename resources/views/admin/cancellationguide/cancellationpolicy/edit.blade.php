@extends('admin.layout.app')
@section('title', 'Edit Cancellation Policy')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <form id="CancellationPolicyForm" action="{{ url('admin/cancellation-policy-update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Cancellation Policy</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Description <span style="color: red;">*</span></label>
                                        <textarea name="main_description" id="main_description" class="form-control">{{ old('main_description', $data->main_description ?? '') }}</textarea>
                                        <div id="description-error" class="invalid-feedback"
                                            style="display: none; font-size:14px; color:red;"></div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('main_description');

        $(document).ready(function() {
            $('#CancellationPolicyForm').on('submit', function(e) {
                
                // Get CKEditor content
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                const desc = CKEDITOR.instances.main_description.getData().trim();

                // Remove old error
                $('#main_description').removeClass('is-invalid');
                $('#description-error').hide();

                // Check if empty
                if (!desc || desc.replace(/&nbsp;|<[^>]*>/g, '').trim() === '') {
                    e.preventDefault();
                    $('#main_description').addClass('is-invalid');
                    $('#description-error').text('Description is required.').show();
                }

            });

            CKEDITOR.instances.description.on('focus', function() {
                $('#main_description').removeClass('is-invalid');
                $('#description-error').hide();
            });

            // Hide error on click
            $('#main_description').on('focus', function() {
                $('#main_description').removeClass('is-invalid');
                $('#description-error').hide();
            });
        });
    </script>
@endsection
