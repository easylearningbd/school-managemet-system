@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employee Salary Increment</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

 <form method="post" action="{{ route('update.increment.store',$editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

   <div class="row">
   	<div class="col-md-6">

    <div class="form-group">
		<h5>Salary Amount <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="increment_salary" class="form-control" > 
	  </div>
		 
	</div>


   	</div> <!-- // end col md-6 -->


   		<div class="col-md-6">

   	 <div class="form-group">
		<h5>Effected Date  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="effected_salary" class="form-control" > 
	  </div>
		 
	</div>
   		
   	</div> <!-- // end col md-6 -->
   	
   </div> <!-- // end row -->

	 
							 
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
