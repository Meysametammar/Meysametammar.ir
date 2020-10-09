@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Register Student') }}</div>

            <div class="card-body">
                @if (count($students) > 0)
                @foreach ($students as $student)
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead style="text-align: center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('picture')}}</th>
                            <th scope="col">{{__('name')}}</th>
                            <th scope="col">{{__('birth cert id')}}</th>
                            <th scope="col">{{__('birth date')}}</th>
                            <th scope="col">{{__('school name')}}</th>
                            <th scope="col">{{__('school grade')}}</th>
                            <th scope="col">{{__('last average')}}</th>
                            <th scope="col">{{__('father phone')}}</th>
                            <th scope="col">{{__('father job')}}</th>
                            <th scope="col">{{__('mother phone')}}</th>
                            <th scope="col">{{__('mother job')}}</th>
                            <th scope="col">{{__('home phone')}}</th>
                            <th scope="col">{{__('home address')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td><img src="{{$student->picture}}" width="90%" style="margin-left: 5%"></td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->birth_cert_id}}</td>
                            <td>{{$student->birth_year}}/{{$student->birth_month}}/{{$student->birth_day}}</td>
                            <td>{{$student->school_name}}</td>
                            <td>{{$student->school_grade}}</td>
                            <td>{{$student->last_school_average}}</td>
                            <td>{{$student->father_phone}}</td>
                            <td>{{$student->father_job}}</td>
                            <td>{{$student->mother_phone}}</td>
                            <td>{{$student->mother_job}}</td>
                            <td>{{$student->home_phone}}</td>
                            <td>{{$student->home_address}}</td>
                        </tr>

                    </tbody>
                </table>
                @endforeach
                @else
                <h2>{{__('There is no student')}}</h2>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection