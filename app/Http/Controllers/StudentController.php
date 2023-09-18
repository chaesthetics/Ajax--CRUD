<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    //handle insert student ajax request
    public function store(Request $request)
    {
        $file = $request->file('avatar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);
        var_dump($request->all());
        $studData = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'course' => $request->course,
            'avatar' => $filename,
        ];

        Student::create($studData);
        return response()->json([
            'status' => 200
        ]);
    }
}
