<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function __construct()
    {
        App::setLocale('fa');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'birth_cert_id' => 'string|required|unique:students,birth_cert_id',
            'birth_day' => 'numeric|required',
            'birth_month' => 'numeric|required',
            'birth_year' => 'numeric|required',
            'school_name' => 'string|required',
            'school_grade' => 'numeric|required',
            'last_average' => 'string|required',
            'father_phone' => '',
            'father_job' => '',
            'mother_phone' => '',
            'mother_job' => '',
            'home_phone' => 'string|required',
            'home_address' => 'string|required',
            'image' => 'image|max:3999',
        ]);
        $student = new Students();
        $student->name = $request->name;
        $student->birth_cert_id = $request->birth_cert_id;
        $student->birth_day = $request->birth_day;
        $student->birth_month = $request->birth_month;
        $student->birth_year = $request->birth_year;
        $student->school_grade = $request->school_grade;
        $student->school_name = $request->school_name;
        $student->last_school_average = $request->last_average;
        $student->father_phone = $request->father_phone;
        $student->father_job = $request->father_job;
        $student->mother_phone = $request->mother_phone;
        $student->mother_job = $request->mother_job;
        $student->home_phone = $request->home_phone;
        $student->home_address = $request->home_address;
        $student->picture = $this->handle_image($request);
        $student->save();
        Session::flash('success', "Success!");
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return string link of image to store in database
     */
    private function handle_image(Request $request)
    {
        if (!$request->hasFile('image')) {
            return '/image/default.jpg';
        }
        if (!$request->file('image')->isValid()) {
            return '/image/default.jpg';
        }
        $extension = $request->image->extension();
        $request->file('image')->move('image', $request->birth_cert_id . "_3-4." . $extension);
        $url = '/image/' . $request->birth_cert_id . "_3-4." . $extension;
        return $url;
    }
}
