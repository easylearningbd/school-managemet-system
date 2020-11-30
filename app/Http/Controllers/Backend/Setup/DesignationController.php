<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation; 

class DesignationController extends Controller
{
    public function ViewDesignation(){
    	$data['allData'] = Designation::all();
    	return view('backend.setup.designation.view_designation',$data);
 
    }


public function DesignationAdd(){
    	return view('backend.setup.designation.add_designation');
    }


public function DesignationStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:designations,name',
	    		
	    	]);

	    	$data = new Designation();
	    	$data->name = $request->name;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Designation Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    return redirect()->route('designation.view')->with($notification);

	    }



public function DesignationEdit($id){
	    	$editData = Designation::find($id);
	    	return view('backend.setup.designation.edit_designation',compact('editData'));
	    }


 public function DesignationUpdate(Request $request,$id){

	 $data = Designation::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:designations,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Designation Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('designation.view')->with($notification);
    }


public function DesignationDelete($id){
	    	$user = Designation::find($id);
	    	$user->delete();

	    	$notification = array(
	    		'message' => 'Designation Deleted Successfully',
	    		'alert-type' => 'info'
	    	);

	   return redirect()->route('designation.view')->with($notification);

	    }



} 
