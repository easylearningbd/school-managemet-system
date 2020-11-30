<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass; 
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
      // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
    	return view('backend.setup.assign_subject.view_assign_subject',$data);
    }


     public function AddAssignSubject(){
    	$data['subjects'] = SchoolSubject::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.setup.assign_subject.add_assign_subject',$data);
    }


	public function StoreAssignSubject(Request $request){

	    	$subjectCount = count($request->subject_id);
	    	if ($subjectCount !=NULL) {
	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$assign_subject = new AssignSubject();
	    			$assign_subject->class_id = $request->class_id;
	    			$assign_subject->subject_id = $request->subject_id[$i];
	    			$assign_subject->full_mark = $request->full_mark[$i];
	    			$assign_subject->pass_mark = $request->pass_mark[$i];
	    			$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_subject->save();

	    		} // End For Loop
	    	}// End If Condition

	    	$notification = array(
	    		'message' => 'Subject Assign Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('assign.subject.view')->with($notification);

	    }  // End Method 


	 public function EditAssignSubject($class_id){
	    	$data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
	    	// dd($data['editData']->toArray());
	    $data['subjects'] = SchoolSubject::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.setup.assign_subject.edit_assign_subject',$data);

	    }


public function UpdateAssignSubject(Request $request,$class_id){
    	if ($request->subject_id == NULL) {
       
        $notification = array(
    		'message' => 'Sorry You do not select any Subject',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.subject.edit',$class_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->subject_id);
	AssignSubject::where('class_id',$class_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_subject = new AssignSubject();
	    			$assign_subject->class_id = $request->class_id;
	    			$assign_subject->subject_id = $request->subject_id[$i];
	    			$assign_subject->full_mark = $request->full_mark[$i];
	    			$assign_subject->pass_mark = $request->pass_mark[$i];
	    			$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_subject->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.subject.view')->with($notification);
    } // end Method 


	public function DetailsAssignSubject($class_id){
   $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();

   return view('backend.setup.assign_subject.details_assign_subject',$data);


 	}




}
 