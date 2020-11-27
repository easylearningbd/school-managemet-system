@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Change Password</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('password.update') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Current Password <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="oldpassword" id="current_password" class="form-control" > 
	 @error('oldpassword')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>
 
	 
		
	<div class="form-group">
		<h5>New Password <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="password" id="password" class="form-control"  >
      @error('password')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	   </div>
		 
	</div>

		<div class="form-group">
		<h5>Confirm Password  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
    @error('password_confirmation')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror

	   </div>
		 
	</div>
 
  
							 
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
