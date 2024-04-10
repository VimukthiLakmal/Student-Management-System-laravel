<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Student();
    }

    public function index()
    {
        $response['students'] = $this->task->all();
        //dd($response);
        return view('pages.home.index')->with($response);
    }
    public function store(Request $request)
    {
        $this->task->create($request->all());

        return redirect()->back();
    }

    public function delete($student_id)
    {
        $student = $this->task->find($student_id);
        $student->delete();

        return redirect()->back();
    }

    public function change($student_id)
    {
        $student = $this->task->find($student_id);
        $student-> status = 1;
        $student->update();

        return redirect()->back();
    }

    public function edit($student_id)
    {
        $response ['student'] = studentFacade::get($request['student_id']);
        return view('pages.home.edit')->with($response);
    }

    public function update(Request $request, $student_id)
    {
        studentFacade::update($request->all(), $student_id);
        return redirect()->back();
    }

}
