@extends('admin.layout.app')
@section('title', 'Cancellation Policy')
@section('content')

    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="main-content" style="min-height: 562px;">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>Cancellation Policy</h4>
                                </div>
                            </div>
                            <div class="card-body table-striped table-bordered table-responsive">


                                <table class="table" id="table_id_events">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>

                                           <td title="{{ $data && $data->main_description ? strip_tags(html_entity_decode($data->main_description)) : 'No description available' }}">
												@if ($data && $data->main_description)
													{!! Str::limit(strip_tags($data->main_description), 200, '...') !!}
												@else
													<p>No description available.</p>
												@endif
											</td>

                                            <td>
                                                <div class="d-flex gap-1">

                                                    @if (Auth::guard('admin')->check() ||
                                                            ($sideMenuPermissions->has('Cancellation Policy') && $sideMenuPermissions['Cancellation Policy']->contains('edit')))
                                                        <a href="{{ url('/admin/cancellation-policy-edit') }}"
                                                            class="btn btn-primary"><span class="fa fa-edit"></a>
                                                    @endif

                                                    @if (Auth::guard('admin')->check() ||
                                                            ($sideMenuPermissions->has('Cancellation Policy') && $sideMenuPermissions['Cancellation Policy']->contains('show')))
                                                        <a href="{{ route('cancellationpolicy.show', $data->id) }}"
                                                            class="btn btn-primary"><span class="fa fa-eye"></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id_events').DataTable()
        })
    </script>

@endsection
