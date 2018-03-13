<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import student model from the app folder
use App\Student;//use have access to database

class StudentController extends Controller
{
    //creating index method to display students
    public function index(){
      $students = Student::all();
      // return 'display students here.';
      $name = "vincent";
      return view('students.index',compact('name','students'));
    }
}
