@extends('layouts.app')

@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Register Student') }}</div>

            <div class="card-body">
                {!! Form::open(['action' => 'App\Http\Controllers\StudentsController@store', 'method' =>
                'POST','enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{Form::label('name', __('Name and Family'))}}
                                {{Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => __('Name and Family'),'required'=>true])}}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{Form::label('birth_cert_id', __('Birth Certificate ID'))}}
                                {{Form::text('birth_cert_id', old('birth_cert_id'), ['class' => 'form-control', 'placeholder' => __('0372020204'),'required'=>true])}}
                                @error('birth_cert_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{Form::label('birth_date', __('Birth Date'))}}
                                <div class="row">
                                    <div class="col-md-4">
                                        {{Form::number('birth_day', old('birth_day'), ['class' => 'form-control', 'placeholder' => __('Day'),'required'=>true])}}
                                    </div>
                                    <div class="col-md-4">
                                        {{Form::number('birth_month', old('birth_month'), ['class' => 'form-control', 'placeholder' => __('Month'),'required'=>true])}}
                                    </div>
                                    <div class="col-md-4">
                                        {{Form::number('birth_year', old('birth_year'), ['class' => 'form-control', 'placeholder' => __('Year'),'required'=>true])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{Form::label('school_name', __('School Name'))}}
                                {{Form::text('school_name', old('phone'), ['class' => 'form-control', 'placeholder' => __('Shahed Saheb al zaman'),'required'=>true])}}
                            </div>
                            <div class="col-md-4">
                                {{Form::label('school_grade', __('School Grade'))}}
                                {{Form::number('school_grade', old('phone'), ['class' => 'form-control', 'placeholder' => __('6'),'required'=>true])}}
                            </div>
                            <div class="col-md-4">
                                {{Form::label('last_average', __('Last year average'))}}
                                {{Form::text('last_average', old('phone'), ['class' => 'form-control','placeholder' => __('19.25'),'required'=>true])}}
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                {{Form::label('father_phone', __("Father's Phone"))}}
                                {{Form::text('father_phone', old('phone'), ['class' => 'form-control', 'placeholder' => __('09120000000')])}}
                            </div>
                            <div class="col-md-3">
                                {{Form::label('father_job', __("Father's Job"))}}
                                {{Form::text('father_job', old('phone'), ['class' => 'form-control', 'placeholder' => __('employed')])}}
                            </div>
                            <div class="col-md-3">
                                {{Form::label('mother_phone', __("Mother's Phone"))}}
                                {{Form::text('mother_phone', old('phone'), ['class' => 'form-control', 'placeholder' => __('09120000000')])}}
                            </div>
                            <div class="col-md-3">
                                {{Form::label('mother_job', __("Mother's Job"))}}
                                {{Form::text('mother_job', old('phone'), ['class' => 'form-control', 'placeholder' => __('home')])}}
                            </div>
                            <div class="col-md-3">
                                {{Form::label('home_phone', __("Home Phone"))}}
                                {{Form::text('home_phone', old('phone'), ['class' => 'form-control', 'placeholder' => __('02532700000'),'required'=>true])}}
                            </div>
                            <div class="col-md-9">
                                {{Form::label('home_address', __("Home Address"))}}
                                {{Form::text('home_address', old('phone'), ['class' => 'form-control', 'placeholder' => __('Qom, salarie'),'required'=>true])}}
                            </div>


                        </div>
                        <div class="form-group row">
                            <div>
                                {{Form::label('image', __('3*4 Picture '))}}
                                {{Form::file('image')}}
                            </div class="col-md-4">
                            <div class="col-md-3">
                                <img id="picture">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-4 offset-4">
                            {{Form::submit(__('Submit and New'), ['class' => 'btn btn-primary w-100'])}}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection