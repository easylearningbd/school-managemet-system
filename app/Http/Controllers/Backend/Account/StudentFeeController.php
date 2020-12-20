<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\ExamType;
use DB;
use PDF;

use App\Models\AccountStudentFee;
use App\Models\FeeCategory;

class StudentFeeController extends Controller
{
    public function StudentFeeView(){

    	$data['allData'] = AccountStudentFee::all(); 
    	return view('backend.account.student_fee.student_fee_view',$data);
    }


    public function StudentFeeAdd(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['fee_categories'] = FeeCategory::all();
    	return view('backend.account.student_fee.student_fee_add',$data);

    }


  public function StudentFeeGetStudent(Request $request){

   	$year_id = $request->year_id;
   	$class_id = $request->class_id;
   	$fee_category_id = $request->fee_category_id;
   	$date = date('Y-m',strtotime($request->date));    	   
    	 
  $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
    	 
    	 $html['thsource']  = '<th>ID No</th>';
    	 $html['thsource'] .= '<th>Student Name</th>';
    	 $html['thsource'] .= '<th>Father Name</th>';
    	 $html['thsource'] .= '<th>Original Fee </th>';
      	 $html['thsource'] .= '<th>Discount Amount</th>';
      	 $html['thsource'] .= '<th>Fee (This Student)</th>';
      	 $html['thsource'] .= '<th>Select</th>';

    	 foreach ($data as $key => $std) {
$registrationfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();

$accountstudentfees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();

if($accountstudentfees !=null) {
 	$checked = 'checked';
 }else{
 	$checked = '';
 }  	 	 
 	$color = 'success';
 	$html[$key]['tdsource']  = '<td>'.$std['student']['id_no']. '<input type="hidden" name="fee_category_id" value= " '.$fee_category_id.' " >'.'</td>';

 	$html[$key]['tdsource']  .= '<td>'.$std['student']['name']. '<input type="hidden" name="year_id" value= " '.$std->year_id.' " >'.'</td>';

 	$html[$key]['tdsource']  .= '<td>'.$std['student']['fname']. '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';

 	$html[$key]['tdsource']  .= '<td>'.$registrationfee->amount.'$'.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';

 	$html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';
  
 	 $orginalfee = $registrationfee->amount;
 	 $discount = $std['discount']['discount'];
 	 $discountablefee = $discount/100*$orginalfee;
 	 $finalfee = (int)$orginalfee-(int)$discountablefee;    	 	 

 	$html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';
 	 
 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

    	 }  
    	return response()->json(@$html);

   } // end mehtod


  

    public function StudentFeeStore(Request $request){
        
    	$date = date('Y-m',strtotime($request->date));

    	AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();

    	$checkdata = $request->checkmanage;

    	if ($checkdata !=null) {
    		for ($i=0; $i <count($checkdata) ; $i++) { 
    			$data = new AccountStudentFee();
    			$data->year_id = $request->year_id;
    			$data->class_id = $request->class_id;
    			$data->date = $date;
    			$data->fee_category_id = $request->fee_category_id;
    			$data->student_id = $request->student_id[$checkdata[$i]];
    			$data->amount = $request->amount[$checkdata[$i]];
    			$data->save();
    		} // end for loop
    	} // end if 

    	if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.fee.view')->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 

    } // end method 

    



}
 