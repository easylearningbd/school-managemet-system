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
				  <h3 class="box-title">Student Fee List </h3>
	<a href="{{ route('student.fee.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add / Edit Student Fee</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>ID No</th> 
				<th>Name </th>
				<th>Year</th>
				<th>Class </th>
				<th>Fee Type</th>
				<th>Amount</th>
				<th>Date</th> 
				 
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value['student']['id_no'] }}</td>	
				<td> {{ $value['student']['name'] }}</td>	
				<td> {{ $value['student_year']['name'] }}</td>	
				<td> {{ $value['student_class']['name'] }}</td>	
				<td> {{ $value['fee_category']['name'] }} </td>	
				<td> {{ $value->amount }}</td>
				<td> {{ date('M Y', strtotime($value->date))  }}</td>
				 		  
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
