<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class StudentController extends Controller
{
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
    public function create(array $data, Request $request)
    {
        //
        Student::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'nric_passport_number' => $data['nric'],
            'email' => $data['email'],
            'edu_inst' => $data['inst'],
            'student_id_no' => $data['stu_id_no'],
            'stu_id_file' => $data['stu_id_file'],
        ]);
        return $student;
    }

    public function insert(Request $student) {
        $user_id = $student->user()->id;
        $name = $student->input('name');
        $nric_passport_number = $student->input('nric');
        $email = $student->input('email');
        $edu_inst = $student->input('inst');
        $student_id_no = $student->input('stu_id_no');
        $stu_id_file = $student->input('stu_id_file');
        DB::insert('insert into students (user_id, name, nric_passport_number, email, edu_inst, student_id_no, photo)
         values(?,?,?,?,?,?,?)',[$user_id, $name, $nric_passport_number, $email, $edu_inst, $student_id_no, $stu_id_file]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
