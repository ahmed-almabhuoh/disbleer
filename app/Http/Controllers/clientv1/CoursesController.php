<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    //
    public function getCoursesPage()
    {
        $courses = Course::byStatus('active')->paginate(10);
        return response()->view('frontend.client-v1.courses.courses', [
            'courses' => $courses,
            'disable_courses' => auth()->user()->courses,
        ]);
    }

    public function courseDetails($slug)
    {
        $course = Course::byStatus('active')->where('slug', $slug)->first();
        if (is_null($course))
            return redirect()->route('clientv1.courses');
        return response()->view('frontend.client-v1.courses.details', [
            'course' => $course,
        ]);
    }

    public function enrolling($id)
    {
        $course = Course::byStatus('active')->where('id', Crypt::decrypt($id))->first();
        DB::table('course_disable')->insert([
            'disable_id' => auth()->user()->id,
            'course_id' => $course->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('clientv1.courses')->with([
            'message' => __('Course enrolled successfully: ') . $course->name,
            'class' => 'success',
        ]);
    }
}
