<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
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

    // Handle fetch all students ajax request
    public function fetchAll()
    {
        $students = Student::all();   
        $output =  '';
        if($students->count() > 0){
            $output .= '
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="stripe w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Avatar
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Course
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>';
            foreach($students->reverse() as $student){
                $output .= '
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    '.$student->id.'
                </th>
                <td class="px-6 py-4">
                    <img class="rounded-lg h-15 w-15 object-cover" src="storage/images/'.$student->avatar.'">
                </td>
                <td class="px-6 py-4">
                    '.$student->first_name.' '.$student->last_name.'
                </td>
                <td class="px-6 py-4">
                    '.$student->email.'
                </td>
                <td class="px-6 py-4">
                    '.$student->course.'
                </td>
                <td class="px-6 py-4">
                    '.$student->phone.'
                </td>
                <td class="px-6 py-4 items-center text-center">
                <button id="'. $student->id .'" class="text-succes editIcon w-full focus:outline-none bg-blue-700 text-white font-bold pt-2 pb-2 pl-5 pr-5 rounded-md" data-toggle="modal" data-target="#exampleModal">Edit</button>
                <button id="'.$student->id.'" class="deleteIcon pt-2 pb-2 pl-5 font-bold rounded-md text-white border bg-neutral-800 pr-5 w-full border-gray-800 ">Delete</button>
                </td>
            </tr>';
            }
            $output .= '</tbody></table></div>';
            echo $output;
        }else{
            echo '<h1>No record in database</h1>';
        }
        
    }

    // handle edit student ajax request
    public function edit(Request $request)
    {
        $id = $request->id;
        $student = Student::find($id);
        return response()->json($student);
    }

    // hande update student ajax request
    public function update(Request $request)
    {
        $fileName = '';
        $student = Student::find($request->student_id);
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $fileName = time(). '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if($student->avatar){
                Storage::delete('public/images/'.$student->avatar);
            }
        }
        else
        {
            $fileName = $request->student_avatar;
        }
        $studentData = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'course' => $request->course,
            'avatar' => $fileName,
        ];

        $student->update($studentData);
        return response()->json([
            'status' => 200
        ]);
    }

    // handle delete student ajax request
    public function delete(Request $request)
    {
        $student = Student::find($request->id);
        $student->delete();
        
        return response()->json([
            'status' => 200
        ]);
    }
}
