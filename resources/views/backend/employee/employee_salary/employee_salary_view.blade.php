@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Salary List</h3>
	<a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Employee Salary</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Name</th> 
				<th>ID NO</th>
				<th>Mobile</th>
				<th>Gender</th>
				<th>Join Date</th>
				<th>Salary</th>
				 
				<th width="20%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value->name }}</td>	
				<td> {{ $value->id_no }}</td>	
				<td> {{ $value->mobile }}</td>	
				<td> {{ $value->gender }}</td>	
				<td> {{ date('d-m-Y',strtotime($value->join_date))  }}</td>	
				<td> {{ $value->salary }}</td>
				 		 
				<td>
<a title="Increment" href="{{ route('employee.salary.increment',$value->id) }}" class="btn btn-info"> <i class="fa fa-plus-circle"></i></a>

<a title="Details" target="_blank" href="{{ route('employee.salary.details',$value->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>

				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
