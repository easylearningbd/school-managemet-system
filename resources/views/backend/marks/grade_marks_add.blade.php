@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Grade Marks  </h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('store.marks.grade') }}"  >
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 	
 		<div class="row"> <!-- 1st Row -->
 			
 			<div class="col-md-4">

 		 <div class="form-group">
		<h5>Grade Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="grade_name" class="form-control" required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-4">

 		 <div class="form-group">
		<h5>Grade Point <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="grade_point" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 -->



	<div class="col-md-4">

 		 <div class="form-group">
		<h5>Start Marks <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="start_marks" class="form-control" required=""> 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 1stRow -->






	<div class="row"> <!-- 2nd Row -->
 			
 			 


	<div class="col-md-4">

 		 <div class="form-group">
		<h5>End Marks <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="end_marks" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 -->



	<div class="col-md-4">

 	 <div class="form-group">
		<h5>Start Point <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="start_point" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 



<div class="col-md-4">

 		 <div class="form-group">
		<h5>End Point <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="end_point" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 

 
 			
 		</div> <!-- End 2nd Row -->



<div class="row"> <!-- 3rd Row -->

 
 			
 			<div class="col-md-4">

 		<div class="form-group">
		<h5>Remarks <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="remarks" class="form-control" required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-4">

 		  
 			</div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 3rd Row -->

 
 
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>


 
 
	  
	  </div>
  </div>
  
@endsection
