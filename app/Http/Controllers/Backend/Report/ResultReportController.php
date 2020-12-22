<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentMarks;

use PDF;
use App\Models\AssignStudent;


class ResultReportController extends Controller
{
    public function ResultView(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['exam_type'] = ExamType::all();
    	return view('backend.report.student_result.student_result_view',$data);

    }


    public function ResultGet(Request $request){

    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;

    	$singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();

    if ($singleResult == true) {
    	$data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
    	// dd($data['allData']->toArray());

    $pdf = PDF::loadView('backend.report.student_result.student_result_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
      }
    } // end Method 



    public function IdcardView(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.report.idcard.idcard_view',$data);
    }


    public function IdcardGet(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;

    	$check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();

    if ($check_data == true) {
    	$data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
    	// dd($data['allData']->toArray());

    $pdf = PDF::loadView('backend.report.idcard.idcard_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{

    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    }


    }// end method 



}
 