<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact-us');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('bt_admin', 'AdminController@index')->name('admin.home');
Route::get('bt_admin/media', 'AdminController@media')->name('admin.media');
Route::get('bt_admin/profile', 'AdminController@profile')->name('admin.profile');
//['middleware' => ['role:admin']],

Route::group([ 'prefix' => 'bt_admin','middleware' => ['auth', 'level:1']], function () {
    Route::get('/api/patient/{id}','UsersController@patientInfo')->name('api.patient.show')->where('id', '[0-9]+');

Route::group(
[
    'prefix' => 'nursing_visits',
], function () {

    Route::get('/', 'NursingVisitsController@index')
         ->name('nursing_visits.nursing_visit.index');

    Route::get('/create','NursingVisitsController@create')
         ->name('nursing_visits.nursing_visit.create');

    Route::get('/show/{nursingVisit}','NursingVisitsController@show')
         ->name('nursing_visits.nursing_visit.show')
         ->where('id', '[0-9]+');

    Route::get('/{nursingVisit}/edit','NursingVisitsController@edit')
         ->name('nursing_visits.nursing_visit.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'NursingVisitsController@store')
         ->name('nursing_visits.nursing_visit.store');
               
    Route::put('nursing_visit/{nursingVisit}', 'NursingVisitsController@update')
         ->name('nursing_visits.nursing_visit.update')
         ->where('id', '[0-9]+');

    Route::delete('/nursing_visit/{nursingVisit}','NursingVisitsController@destroy')
         ->name('nursing_visits.nursing_visit.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'patient_histories',
], function () {

    Route::get('/', 'PatientHistoriesController@index')
         ->name('patient_histories.patient_history.index');

    Route::get('/create','PatientHistoriesController@create')
         ->name('patient_histories.patient_history.create');

    Route::get('/show/{patientHistory}','PatientHistoriesController@show')
         ->name('patient_histories.patient_history.show')
         ->where('id', '[0-9]+');

    Route::get('/{patientHistory}/edit','PatientHistoriesController@edit')
         ->name('patient_histories.patient_history.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'PatientHistoriesController@store')
         ->name('patient_histories.patient_history.store');
               
    Route::put('patient_history/{patientHistory}', 'PatientHistoriesController@update')
         ->name('patient_histories.patient_history.update')
         ->where('id', '[0-9]+');

    Route::delete('/patient_history/{patientHistory}','PatientHistoriesController@destroy')
         ->name('patient_histories.patient_history.destroy')
         ->where('id', '[0-9]+');

});


    Route::group(
        [
            'prefix' => 'sliders',
        ], function () {

        Route::get('/', 'SlidersController@index')
            ->name('sliders.slider.index');

        Route::get('/create','SlidersController@create')
            ->name('sliders.slider.create');

        Route::get('/show/{slider}','SlidersController@show')
            ->name('sliders.slider.show')
            ->where('id', '[0-9]+');

        Route::get('/{slider}/edit','SlidersController@edit')
            ->name('sliders.slider.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'SlidersController@store')
            ->name('sliders.slider.store');

        Route::put('slider/{slider}', 'SlidersController@update')
            ->name('sliders.slider.update')
            ->where('id', '[0-9]+');

        Route::delete('/slider/{slider}','SlidersController@destroy')
            ->name('sliders.slider.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'settings',
        ], function () {

        Route::get('/', 'SettingsController@index')
            ->name('settings.setting.index');

        Route::get('/create','SettingsController@create')
            ->name('settings.setting.create');

        Route::get('/show/{setting}','SettingsController@show')
            ->name('settings.setting.show')
            ->where('id', '[0-9]+');

        Route::get('/{setting}/edit','SettingsController@edit')
            ->name('settings.setting.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'SettingsController@store')
            ->name('settings.setting.store');

        Route::put('setting/{setting}', 'SettingsController@update')
            ->name('settings.setting.update')
            ->where('id', '[0-9]+');

        Route::delete('/setting/{setting}','SettingsController@destroy')
            ->name('settings.setting.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'roles',
        ], function () {

        Route::get('/', 'RolesController@index')
            ->name('roles.role.index');

        Route::get('/create','RolesController@create')
            ->name('roles.role.create');

        Route::get('/show/{role}','RolesController@show')
            ->name('roles.role.show')
            ->where('id', '[0-9]+');

        Route::get('/{role}/edit','RolesController@edit')
            ->name('roles.role.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'RolesController@store')
            ->name('roles.role.store');

        Route::put('role/{role}', 'RolesController@update')
            ->name('roles.role.update')
            ->where('id', '[0-9]+');

        Route::delete('/role/{role}','RolesController@destroy')
            ->name('roles.role.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'users',
        ], function () {

        Route::get('/', 'UsersController@index')
            ->name('users.user.index');

        Route::get('/create','UsersController@create')
            ->name('users.user.create');

        Route::get('/show/{user}','UsersController@show')
            ->name('users.user.show')
            ->where('id', '[0-9]+');

        Route::get('/{user}/edit','UsersController@edit')
            ->name('users.user.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'UsersController@store')
            ->name('users.user.store');

        Route::put('user/{user}', 'UsersController@update')
            ->name('users.user.update')
            ->where('id', '[0-9]+');

        Route::delete('/user/{user}','UsersController@destroy')
            ->name('users.user.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'case_notes',
        ], function () {

        Route::get('/', 'CaseNotesController@index')
            ->name('case_notes.case_note.index');

        Route::get('/create','CaseNotesController@create')
            ->name('case_notes.case_note.create');

        Route::get('/show/{caseNote}','CaseNotesController@show')
            ->name('case_notes.case_note.show')
            ->where('id', '[0-9]+');

        Route::get('/{caseNote}/edit','CaseNotesController@edit')
            ->name('case_notes.case_note.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'CaseNotesController@store')
            ->name('case_notes.case_note.store');

        Route::put('case_note/{caseNote}', 'CaseNotesController@update')
            ->name('case_notes.case_note.update')
            ->where('id', '[0-9]+');

        Route::delete('/case_note/{caseNote}','CaseNotesController@destroy')
            ->name('case_notes.case_note.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'patient_call_logs',
        ], function () {

        Route::get('/', 'PatientCallLogsController@index')
            ->name('patient_call_logs.patient_call_log.index');

        Route::get('/create','PatientCallLogsController@create')
            ->name('patient_call_logs.patient_call_log.create');

        Route::get('/show/{patientCallLog}','PatientCallLogsController@show')
            ->name('patient_call_logs.patient_call_log.show')
            ->where('id', '[0-9]+');

        Route::get('/{patientCallLog}/edit','PatientCallLogsController@edit')
            ->name('patient_call_logs.patient_call_log.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'PatientCallLogsController@store')
            ->name('patient_call_logs.patient_call_log.store');

        Route::put('patient_call_log/{patientCallLog}', 'PatientCallLogsController@update')
            ->name('patient_call_logs.patient_call_log.update')
            ->where('id', '[0-9]+');

        Route::delete('/patient_call_log/{patientCallLog}','PatientCallLogsController@destroy')
            ->name('patient_call_logs.patient_call_log.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'hiv_patients',
        ], function () {

        Route::get('/', 'HivPatientsController@index')
            ->name('hiv_patients.hiv_patient.index');

        Route::get('/create','HivPatientsController@create')
            ->name('hiv_patients.hiv_patient.create');

//    Route::get('/create','HivPatientsController@createStepTwo')
//         ->name('hiv_patients.hiv_patient.create_step_two');

        Route::get('/show/{hivPatient}','HivPatientsController@show')
            ->name('hiv_patients.hiv_patient.show')
            ->where('id', '[0-9]+');

        Route::get('/{hivPatient}/edit','HivPatientsController@edit')
            ->name('hiv_patients.hiv_patient.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'HivPatientsController@storeStepOne')
            ->name('hiv_patients.hiv_patient.store_step_one');

        Route::put('hiv_patient/{hivPatient}', 'HivPatientsController@update')
            ->name('hiv_patients.hiv_patient.update')
            ->where('id', '[0-9]+');

        Route::delete('/hiv_patient/{hivPatient}','HivPatientsController@destroy')
            ->name('hiv_patients.hiv_patient.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'clinician_assessments',
        ], function () {

        Route::get('/', 'ClinicianAssessmentsController@index')
            ->name('clinician_assessments.clinician_assessment.index');

        Route::get('/create','ClinicianAssessmentsController@create')
            ->name('clinician_assessments.clinician_assessment.create');

        Route::get('/show/{clinicianAssessment}','ClinicianAssessmentsController@show')
            ->name('clinician_assessments.clinician_assessment.show')
            ->where('id', '[0-9]+');

        Route::get('/{clinicianAssessment}/edit','ClinicianAssessmentsController@edit')
            ->name('clinician_assessments.clinician_assessment.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'ClinicianAssessmentsController@store')
            ->name('clinician_assessments.clinician_assessment.store');

        Route::put('clinician_assessment/{clinicianAssessment}', 'ClinicianAssessmentsController@update')
            ->name('clinician_assessments.clinician_assessment.update')
            ->where('id', '[0-9]+');

        Route::delete('/clinician_assessment/{clinicianAssessment}','ClinicianAssessmentsController@destroy')
            ->name('clinician_assessments.clinician_assessment.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'art_treatments',
        ], function () {

        Route::get('/', 'ArtTreatmentsController@index')
            ->name('art_treatments.art_treatment.index');

        Route::get('/create','ArtTreatmentsController@create')
            ->name('art_treatments.art_treatment.create');

        Route::get('/show/{artTreatment}','ArtTreatmentsController@show')
            ->name('art_treatments.art_treatment.show')
            ->where('id', '[0-9]+');

        Route::get('/{artTreatment}/edit','ArtTreatmentsController@edit')
            ->name('art_treatments.art_treatment.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'ArtTreatmentsController@store')
            ->name('art_treatments.art_treatment.store');

        Route::put('art_treatment/{artTreatment}', 'ArtTreatmentsController@update')
            ->name('art_treatments.art_treatment.update')
            ->where('id', '[0-9]+');

        Route::delete('/art_treatment/{artTreatment}','ArtTreatmentsController@destroy')
            ->name('art_treatments.art_treatment.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'treatment_interruptions',
        ], function () {

        Route::get('/', 'TreatmentInterruptionsController@index')
            ->name('treatment_interruptions.treatment_interruption.index');

        Route::get('/create','TreatmentInterruptionsController@create')
            ->name('treatment_interruptions.treatment_interruption.create');

        Route::get('/show/{treatmentInterruption}','TreatmentInterruptionsController@show')
            ->name('treatment_interruptions.treatment_interruption.show')
            ->where('id', '[0-9]+');

        Route::get('/{treatmentInterruption}/edit','TreatmentInterruptionsController@edit')
            ->name('treatment_interruptions.treatment_interruption.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'TreatmentInterruptionsController@store')
            ->name('treatment_interruptions.treatment_interruption.store');

        Route::put('treatment_interruption/{treatmentInterruption}', 'TreatmentInterruptionsController@update')
            ->name('treatment_interruptions.treatment_interruption.update')
            ->where('id', '[0-9]+');

        Route::delete('/treatment_interruption/{treatmentInterruption}','TreatmentInterruptionsController@destroy')
            ->name('treatment_interruptions.treatment_interruption.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'treatment_records',
        ], function () {

        Route::get('/', 'TreatmentRecordsController@index')
            ->name('treatment_records.treatment_record.index');

        Route::get('/create','TreatmentRecordsController@create')
            ->name('treatment_records.treatment_record.create');

        Route::get('/show/{treatmentRecord}','TreatmentRecordsController@show')
            ->name('treatment_records.treatment_record.show')
            ->where('id', '[0-9]+');

        Route::get('/{treatmentRecord}/edit','TreatmentRecordsController@edit')
            ->name('treatment_records.treatment_record.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'TreatmentRecordsController@store')
            ->name('treatment_records.treatment_record.store');

        Route::put('treatment_record/{treatmentRecord}', 'TreatmentRecordsController@update')
            ->name('treatment_records.treatment_record.update')
            ->where('id', '[0-9]+');

        Route::delete('/treatment_record/{treatmentRecord}','TreatmentRecordsController@destroy')
            ->name('treatment_records.treatment_record.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'discharge_summaries',
        ], function () {

        Route::get('/', 'DischargeSummariesController@index')
            ->name('discharge_summaries.discharge_summary.index');

        Route::get('/create','DischargeSummariesController@create')
            ->name('discharge_summaries.discharge_summary.create');

        Route::get('/show/{dischargeSummary}','DischargeSummariesController@show')
            ->name('discharge_summaries.discharge_summary.show')
            ->where('id', '[0-9]+');

        Route::get('/{dischargeSummary}/edit','DischargeSummariesController@edit')
            ->name('discharge_summaries.discharge_summary.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'DischargeSummariesController@store')
            ->name('discharge_summaries.discharge_summary.store');

        Route::put('discharge_summary/{dischargeSummary}', 'DischargeSummariesController@update')
            ->name('discharge_summaries.discharge_summary.update')
            ->where('id', '[0-9]+');

        Route::delete('/discharge_summary/{dischargeSummary}','DischargeSummariesController@destroy')
            ->name('discharge_summaries.discharge_summary.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'facilities',
        ], function () {

        Route::get('/', 'FacilitiesController@index')
            ->name('facilities.facility.index');

        Route::get('/create','FacilitiesController@create')
            ->name('facilities.facility.create');

        Route::get('/show/{facility}','FacilitiesController@show')
            ->name('facilities.facility.show')
            ->where('id', '[0-9]+');

        Route::get('/{facility}/edit','FacilitiesController@edit')
            ->name('facilities.facility.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'FacilitiesController@store')
            ->name('facilities.facility.store');

        Route::put('facility/{facility}', 'FacilitiesController@update')
            ->name('facilities.facility.update')
            ->where('id', '[0-9]+');

        Route::delete('/facility/{facility}','FacilitiesController@destroy')
            ->name('facilities.facility.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'ethnicities',
        ], function () {

        Route::get('/', 'EthnicitiesController@index')
            ->name('ethnicities.ethnicity.index');

        Route::get('/create','EthnicitiesController@create')
            ->name('ethnicities.ethnicity.create');

        Route::get('/show/{ethnicity}','EthnicitiesController@show')
            ->name('ethnicities.ethnicity.show')
            ->where('id', '[0-9]+');

        Route::get('/{ethnicity}/edit','EthnicitiesController@edit')
            ->name('ethnicities.ethnicity.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'EthnicitiesController@store')
            ->name('ethnicities.ethnicity.store');

        Route::put('ethnicity/{ethnicity}', 'EthnicitiesController@update')
            ->name('ethnicities.ethnicity.update')
            ->where('id', '[0-9]+');

        Route::delete('/ethnicity/{ethnicity}','EthnicitiesController@destroy')
            ->name('ethnicities.ethnicity.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'infant_mortalities',
        ], function () {

        Route::get('/', 'InfantMortalitiesController@index')
            ->name('infant_mortalities.infant_mortality.index');

        Route::get('/create','InfantMortalitiesController@create')
            ->name('infant_mortalities.infant_mortality.create');

        Route::get('/show/{infantMortality}','InfantMortalitiesController@show')
            ->name('infant_mortalities.infant_mortality.show')
            ->where('id', '[0-9]+');

        Route::get('/{infantMortality}/edit','InfantMortalitiesController@edit')
            ->name('infant_mortalities.infant_mortality.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'InfantMortalitiesController@store')
            ->name('infant_mortalities.infant_mortality.store');

        Route::put('infant_mortality/{infantMortality}', 'InfantMortalitiesController@update')
            ->name('infant_mortalities.infant_mortality.update')
            ->where('id', '[0-9]+');

        Route::delete('/infant_mortality/{infantMortality}','InfantMortalitiesController@destroy')
            ->name('infant_mortalities.infant_mortality.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'maternal_mortalities',
        ], function () {

        Route::get('/', 'MaternalMortalitiesController@index')
            ->name('maternal_mortalities.maternal_mortality.index');

        Route::get('/create','MaternalMortalitiesController@create')
            ->name('maternal_mortalities.maternal_mortality.create');

        Route::get('/show/{maternalMortality}','MaternalMortalitiesController@show')
            ->name('maternal_mortalities.maternal_mortality.show')
            ->where('id', '[0-9]+');

        Route::get('/{maternalMortality}/edit','MaternalMortalitiesController@edit')
            ->name('maternal_mortalities.maternal_mortality.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'MaternalMortalitiesController@store')
            ->name('maternal_mortalities.maternal_mortality.store');

        Route::put('maternal_mortality/{maternalMortality}', 'MaternalMortalitiesController@update')
            ->name('maternal_mortalities.maternal_mortality.update')
            ->where('id', '[0-9]+');

        Route::delete('/maternal_mortality/{maternalMortality}','MaternalMortalitiesController@destroy')
            ->name('maternal_mortalities.maternal_mortality.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(
        [
            'prefix' => 'death_causes',
        ], function () {

        Route::get('/', 'DeathCausesController@index')
            ->name('death_causes.death_cause.index');

        Route::get('/create','DeathCausesController@create')
            ->name('death_causes.death_cause.create');

        Route::get('/show/{deathCause}','DeathCausesController@show')
            ->name('death_causes.death_cause.show')
            ->where('id', '[0-9]+');

        Route::get('/{deathCause}/edit','DeathCausesController@edit')
            ->name('death_causes.death_cause.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'DeathCausesController@store')
            ->name('death_causes.death_cause.store');

        Route::put('death_cause/{deathCause}', 'DeathCausesController@update')
            ->name('death_causes.death_cause.update')
            ->where('id', '[0-9]+');

        Route::delete('/death_cause/{deathCause}','DeathCausesController@destroy')
            ->name('death_causes.death_cause.destroy')
            ->where('id', '[0-9]+');

    });
            Route::group(
        [
            'prefix' => 'drugs',
        ], function () {

        Route::get('/', 'DrugsController@index')
            ->name('drugs.drug.index');

        Route::get('/create','DrugsController@create')
            ->name('drugs.drug.create');

        Route::get('/show/{drug}','DrugsController@show')
            ->name('drugs.drug.show')
            ->where('id', '[0-9]+');

        Route::get('/{drug}/edit','DrugsController@edit')
            ->name('drugs.drug.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'DrugsController@store')
            ->name('drugs.drug.store');

        Route::put('drug/{drug}', 'DrugsController@update')
            ->name('drugs.drug.update')
            ->where('id', '[0-9]+');

        Route::delete('/drug/{drug}','DrugsController@destroy')
            ->name('drugs.drug.destroy')
            ->where('id', '[0-9]+');

    });
    Route::group(
        [
            'prefix' => 'appointments',
        ], function () {

        Route::get('/', 'AppointmentsController@index')
            ->name('appointments.appointments.index');

        Route::get('/create','AppointmentsController@create')
            ->name('appointments.appointments.create');

        Route::get('/show/{appointments}','AppointmentsController@show')
            ->name('appointments.appointments.show')
            ->where('id', '[0-9]+');

        Route::get('/{appointments}/edit','AppointmentsController@edit')
            ->name('appointments.appointments.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'AppointmentsController@store')
            ->name('appointments.appointments.store');

        Route::put('appointments/{appointments}', 'AppointmentsController@update')
            ->name('appointments.appointments.update')
            ->where('id', '[0-9]+');

        Route::delete('/appointments/{appointments}','AppointmentsController@destroy')
            ->name('appointments.appointments.destroy')
            ->where('id', '[0-9]+');

    });
    Route::get('/my_profile', 'ProfilesController@myProfile')->name('profiles.profile.myprofile');
    Route::get('/coming-soon', 'AdminController@soon')->name('coming');
    Route::get('/patient/create', 'ProfilesController@patientCreate')->name('patients.patient.create');
    Route::get('/patient/all', 'UsersController@patients')->name('patients.patient.index');
    Route::get('/patient/show/{patient}','UsersController@show')->name('patients.patient.show')->where('id', '[0-9]+');
    Route::get('/edit_profile', 'ProfilesController@editMyProfile')->name('profiles.profile.edit_my_profile');
            Route::group(['prefix' => '/emer_call_logs',], function () {
        Route::get('/', 'EmerCallLogsController@index')
            ->name('emer_call_logs.emer_call_log.index');

        Route::get('/create','EmerCallLogsController@create')
            ->name('emer_call_logs.emer_call_log.create');

        Route::get('/show/{emerCallLog}','EmerCallLogsController@show')
            ->name('emer_call_logs.emer_call_log.show')
            ->where('id', '[0-9]+');

        Route::get('/{emerCallLog}/edit','EmerCallLogsController@edit')
            ->name('emer_call_logs.emer_call_log.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'EmerCallLogsController@store')
            ->name('emer_call_logs.emer_call_log.store');

        Route::put('emer_call_log/{emerCallLog}', 'EmerCallLogsController@update')
            ->name('emer_call_logs.emer_call_log.update')
            ->where('id', '[0-9]+');

        Route::delete('/emer_call_log/{emerCallLog}','EmerCallLogsController@destroy')
            ->name('emer_call_logs.emer_call_log.destroy')
            ->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'profiles',], function () {
    Route::get('/', 'ProfilesController@index')->name('profiles.profile.index');
    Route::get('/create','ProfilesController@create')->name('profiles.profile.create');
    Route::get('/show/{profile}','ProfilesController@show')->name('profiles.profile.show')->where('id', '[0-9]+');
    Route::get('/{profile}/edit','ProfilesController@edit')->name('profiles.profile.edit')->where('id', '[0-9]+');
    Route::post('/', 'ProfilesController@store')->name('profiles.profile.store');
    Route::put('profile/{profile}', 'ProfilesController@update')->name('profiles.profile.update')->where('id', '[0-9]+');
    Route::delete('/profile/{profile}','ProfilesController@destroy')->name('profiles.profile.destroy')->where('id', '[0-9]+');


    });
});

Route::group(
[
    'prefix' => 'disease_reports',
], function () {

    Route::get('/', 'DiseaseReportsController@index')
         ->name('disease_reports.disease_report.index');

    Route::get('/create','DiseaseReportsController@create')
         ->name('disease_reports.disease_report.create');

    Route::get('/show/{diseaseReport}','DiseaseReportsController@show')
         ->name('disease_reports.disease_report.show')
         ->where('id', '[0-9]+');

    Route::get('/{diseaseReport}/edit','DiseaseReportsController@edit')
         ->name('disease_reports.disease_report.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DiseaseReportsController@store')
         ->name('disease_reports.disease_report.store');
               
    Route::put('disease_report/{diseaseReport}', 'DiseaseReportsController@update')
         ->name('disease_reports.disease_report.update')
         ->where('id', '[0-9]+');

    Route::delete('/disease_report/{diseaseReport}','DiseaseReportsController@destroy')
         ->name('disease_reports.disease_report.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'drug_references',
], function () {

    Route::get('/', 'DrugReferencesController@index')
         ->name('drug_references.drug_reference.index');

    Route::get('/create','DrugReferencesController@create')
         ->name('drug_references.drug_reference.create');

    Route::get('/show/{drugReference}','DrugReferencesController@show')
         ->name('drug_references.drug_reference.show')
         ->where('id', '[0-9]+');

    Route::get('/{drugReference}/edit','DrugReferencesController@edit')
         ->name('drug_references.drug_reference.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DrugReferencesController@store')
         ->name('drug_references.drug_reference.store');
               
    Route::put('drug_reference/{drugReference}', 'DrugReferencesController@update')
         ->name('drug_references.drug_reference.update')
         ->where('id', '[0-9]+');

    Route::delete('/drug_reference/{drugReference}','DrugReferencesController@destroy')
         ->name('drug_references.drug_reference.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'nurse_notes',
], function () {

    Route::get('/', 'NurseNotesController@index')
         ->name('nurse_notes.nurse_note.index');

    Route::get('/create','NurseNotesController@create')
         ->name('nurse_notes.nurse_note.create');

    Route::get('/show/{nurseNote}','NurseNotesController@show')
         ->name('nurse_notes.nurse_note.show')
         ->where('id', '[0-9]+');

    Route::get('/{nurseNote}/edit','NurseNotesController@edit')
         ->name('nurse_notes.nurse_note.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'NurseNotesController@store')
         ->name('nurse_notes.nurse_note.store');
               
    Route::put('nurse_note/{nurseNote}', 'NurseNotesController@update')
         ->name('nurse_notes.nurse_note.update')
         ->where('id', '[0-9]+');

    Route::delete('/nurse_note/{nurseNote}','NurseNotesController@destroy')
         ->name('nurse_notes.nurse_note.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'documentation_and_physical_exams',
], function () {

    Route::get('/', 'DocumentationAndPhysicalExamsController@index')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.index');

    Route::get('/create','DocumentationAndPhysicalExamsController@create')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.create');

    Route::get('/show/{documentationAndPhysicalExam}','DocumentationAndPhysicalExamsController@show')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.show')
         ->where('id', '[0-9]+');

    Route::get('/{documentationAndPhysicalExam}/edit','DocumentationAndPhysicalExamsController@edit')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DocumentationAndPhysicalExamsController@store')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.store');
               
    Route::put('documentation_and_physical_exam/{documentationAndPhysicalExam}', 'DocumentationAndPhysicalExamsController@update')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.update')
         ->where('id', '[0-9]+');

    Route::delete('/documentation_and_physical_exam/{documentationAndPhysicalExam}','DocumentationAndPhysicalExamsController@destroy')
         ->name('documentation_and_physical_exams.documentation_and_physical_exam.destroy')
         ->where('id', '[0-9]+');

});



Route::group(
[
    'prefix' => 'daily_schedules',
], function () {

    Route::get('/', 'DailySchedulesController@index')
         ->name('daily_schedules.daily_schedule.index');

    Route::get('/create','DailySchedulesController@create')
         ->name('daily_schedules.daily_schedule.create');

    Route::get('/show/{dailySchedule}','DailySchedulesController@show')
         ->name('daily_schedules.daily_schedule.show')
         ->where('id', '[0-9]+');

    Route::get('/{dailySchedule}/edit','DailySchedulesController@edit')
         ->name('daily_schedules.daily_schedule.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DailySchedulesController@store')
         ->name('daily_schedules.daily_schedule.store');
               
    Route::put('daily_schedule/{dailySchedule}', 'DailySchedulesController@update')
         ->name('daily_schedules.daily_schedule.update')
         ->where('id', '[0-9]+');

    Route::delete('/daily_schedule/{dailySchedule}','DailySchedulesController@destroy')
         ->name('daily_schedules.daily_schedule.destroy')
         ->where('id', '[0-9]+');

});

