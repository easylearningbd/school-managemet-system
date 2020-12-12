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
				  <h3 class="box-title">Employee Leave </h3>
	<a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Employee Leave</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Name</th>
				<th>ID No </th>
				<th>Purpose </th>
				<th>Start Date</th>
				<th>End Date</th> 
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $leave )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $leave['user']['name'] }}</td>
				<td> {{ $leave['user']['id_no'] }}</td>
				<td> {{ $leave['purpose']['name'] }}</td>
				<td> {{ $leave->start_date }}</td>
				<td> {{ $leave->end_date }}</td>

				<td>
<a href="{{ route('employee.leave.edit',$leave->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('employee.leave.delete',$leave->id) }}" class="btn btn-danger" id="delete">Delete</a>

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
