<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
use PDF;


class StudentRollController extends Controller
{
    public function StudentRollView(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.student.roll_generate.roll_generate_view',$data);
    }


    public function GetStudents(Request $request){
    	//dd('ok done');
    	$allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
    	// dd($allData->toArray());
    	return response()->json($allData);

    }


    public function StudentRollStore(Request $request){

    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	if ($request->student_id !=null) {
    		for ($i=0; $i < count($request->student_id); $i++) { 
    			AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
    		} // end for loop
    	}else{
    		$notification = array(
    		'message' => 'Sorry there are no student',
    		'alert-type' => 'error'
    	);

    	   return redirect()->back()->with($notification);
    	} // End IF Condition

       $notification = array(
    		'message' => 'Well Done Roll Generated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('roll.generate.view')->with($notification);

    }// end Method 





}
 