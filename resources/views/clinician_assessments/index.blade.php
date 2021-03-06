@extends('layouts.backend')

@section('content')
    <div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-list bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Clinician Assessments</h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('clinician_assessments.clinician_assessment.create') }}" class="btn btn-success" title="Create New Clinician Assessment">
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
        @if(count($clinicianAssessments) == 0)
            <div class="panel-body text-center">
                <h4>No Clinician Assessments Available!</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                                                        <th>Hiv Patient</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Body Mass Index</th>
                            <th>Date</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clinicianAssessments as $clinicianAssessment)
                            <tr>
                                                            <td>{{ optional($clinicianAssessment->hivPatient)->patient_name }}</td>
                            <td>{{ $clinicianAssessment->height }}</td>
                            <td>{{ $clinicianAssessment->weight }}</td>
                            <td>{{ $clinicianAssessment->body_mass_index }}</td>
                            <td>{{ $clinicianAssessment->date }}</td>

                                <td>

                                    <form method="POST" action="{!! route('clinician_assessments.clinician_assessment.destroy', $clinicianAssessment->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            <a href="{{ route('clinician_assessments.clinician_assessment.show', $clinicianAssessment->id ) }}" class="btn btn-sm btn-info" title="Show Clinician Assessment">
                                                <span class="feather icon-eye" aria-hidden="true"></span>
                                            </a>
                                            <a href="{{ route('clinician_assessments.clinician_assessment.edit', $clinicianAssessment->id ) }}" class="btn btn-sm btn-primary" title="Edit Clinician Assessment">
                                                <span class="feather icon-edit" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Clinician Assessment" onclick="return confirm(&quot;Delete Clinician Assessment?&quot;)">
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
                {!! $clinicianAssessments->render() !!}
            </div>

        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection