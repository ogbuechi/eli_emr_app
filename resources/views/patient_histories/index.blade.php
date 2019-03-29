@extends('layouts.backend')

@section('content')
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-list bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Patient Histories</h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('patient_histories.patient_history.create') }}" class="btn btn-success" title="Create New Patient History">
                                    <span class="feather icon-plus" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div id="wizard">
                                            <section>

                        <div class="row">

                            @if(Session::has('success_message'))
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        {!! session('success_message') !!}

                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">
                                @if(count($patientHistories) == 0)
                                    <div class="panel-body text-center">
                                        <h4>No Patient Histories Available!</h4>
                                    </div>
                                @else
                                    <div class="panel-body panel-body-with-table">
                                        <div class="table-responsive">

                                            <table class="table table-striped" id="datatable">
                                                <thead>
                                                <tr>
                                                                                {{-- <th>Patient</th> --}}
                            <th>Patient Name</th>
                            {{-- <th>Patient Medical Case</th>
                            <th>Previous Case</th>
                            <th>Current Case</th>--}}
                            <th>Patient Address</th> 
                            <th>Assigned Doctor</th>

                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($patientHistories as $patientHistory)
                                                    <tr>
                                                                                    {{-- <td>{{ optional($patientHistory->patient)->id }}</td> --}}
                            <td>{{ $patientHistory->patient_name }}</td>
                            {{-- <td>{{ $patientHistory->medical_case }}</td>
                            <td>{{ $patientHistory->previous_case }}</td>
                            <td>{{ $patientHistory->current_case }}</td> --}}
                            <td>{{ $patientHistory->patient_address }}</td>
                            <td>{{ $patientHistory->assigned_doctor }}</td>

                                                        <td>

                                                            <form method="POST" action="{!! route('patient_histories.patient_history.destroy', $patientHistory->id) !!}" accept-charset="UTF-8">
                                                                <input name="_method" value="DELETE" type="hidden">
                                                                {{ csrf_field() }}

                                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                                    <a href="{{ route('patient_histories.patient_history.show', $patientHistory->id ) }}" class="btn btn-sm btn-info" title="Show Patient History">
                                                                        <span class="feather icon-eye" aria-hidden="true"></span>
                                                                    </a>
                                                                    <a href="{{ route('patient_histories.patient_history.edit', $patientHistory->id ) }}" class="btn btn-sm btn-primary" title="Edit Patient History">
                                                                        <span class="feather icon-edit" aria-hidden="true"></span>
                                                                    </a>

                                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete Patient History" onclick="return confirm(&quot;Delete Patient History?&quot;)">
                                                                        <span class="feather icon-trash" aria-hidden="true"></span>
                                                                    </button>
                                                                </div>

                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        {!! $patientHistories->render() !!}
                                    </div>

                                @endif
                            </div>
                        </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection