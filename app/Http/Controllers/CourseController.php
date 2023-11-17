<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view("index", [
            "all_courses"=>$courses
        ]);
    }


    public function create_course(Request $request)
    {
        $request->validate([
            "title" => "required|max:50",
            "description" => "required",
            "cost" => "required|numeric",
            "duration" => "required|numeric",
            "category_id" => "required",
        ], [
            "title.required"=>"Поле обязательного заполнения",
            "description.required"=>"Поле обязательного заполнения",
            "cost.required"=>"Поле обязательного заполнения",
            "duration.required"=>"Поле обязательного заполнения",
            "category_id.required"=>"Поле обязательного заполнения",

            "title.max"=>"Имя должно содержать максимум 50 символов",
            "description.max"=>"Описание должно содержать максимум 50 символов",

            "cost.numeric"=>"Цена должна состоять из цифр",
            "duration.numeric"=>"Цена должна состоять из цифр",
        ]);

        $course_info = $request->all();

        Course::create([
            "title"=> $course_info["title"],
            "description"=> $course_info["description"],
            "cost"=> $course_info["cost"],
            "duration"=> $course_info["duration"],
            "image" => "no",
            "category_id"=> $course_info["category_id"],

        ]);

        return redirect("/admin");
    }

    public function create_categories(Request $request)
    {
        $request->validate([
            "title-course" => "required|max:50",
        ], [
            "title-course.required"=>"Поле обязательного заполнения",
            "title-course.max"=>"Имя должно содержать максимум 50 символов",



        ]);

        $category_info = $request->all();

        Category::create([
            "title"=> $category_info["title-course"],
        ]);

        return redirect("/admin");
    }

}







