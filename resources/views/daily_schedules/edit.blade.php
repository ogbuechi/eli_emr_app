@extends('layouts.backend')

@section('content')

    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="page-header-title pull-left">
                        <i class="feather icon-edit bg-c-blue"></i>
                        <div class="d-inline">
                            <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Daily Schedule' }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('daily_schedules.daily_schedule.index') }}" class="btn btn-primary" title="Show All Daily Schedule">
                                    <span class="feather icon-list" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('daily_schedules.daily_schedule.create') }}" class="btn btn-success" title="Create New Daily Schedule">
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
                            <div class="col-md-12 col-xl-12">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('daily_schedules.daily_schedule.update', $dailySchedule->id) }}" id="edit_daily_schedule_form" name="edit_daily_schedule_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('daily_schedules.form', [
                                            'dailySchedule' => $dailySchedule,
                                          ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection