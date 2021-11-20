@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact Request</a></li>
			<li class="breadcrumb-item active" aria-current="page">Contact Request list</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
				<div class="card-body">
					{{--<h6 class="card-title">Hoverable Table</h6>
					<p class="card-description">Add class <code>.table-hover</code></p>--}}
					
					@if (Session::has('successmessage'))
						<div class='error text-success'>{{ Session::get('successmessage') }}</div>
					@endif 
					@if (Session::has('errormessage'))
						<div class='error text-danger'>{{ Session::get('errormessage') }}</div>
					@endif 
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
                                                                        <th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@php $i=1; @endphp
							
							@foreach($list as $detail)
							
								<tr>
									<th>{{ $i }}</th>
									<td>{{ $detail->name }}</td>
									<td>{{ $detail->email }}</td>
									<td>{{ $detail->phone }}</td>
                                                                        <td>@if($detail->published == 1){{'Closed'}}@else{{'Open'}}@endif</td> 
                                                                        <td>
                                                                            <a href="{{ route('contact.show', $detail->id) }}">
                                                                                    <button type="button" class="btn btn-primary btn-icon" title="View Customer">
											<i data-feather="eye"></i>
										</button>
										</a>
										
										<a href="{{ route('contact.destroy', $detail->id) }}">
                                                                                    <button type="button" class="btn btn-danger btn-icon"title="View Order List"><i data-feather="trash"></i></button>
										</a>
									</td>
								</tr>
							@php $i+=1; @endphp
							@endforeach
							</tbody>
							<tfoot>
								<th colspan="6">{{ $list->links() }}</th>
							</tfoot>
						</table>
					</div>
				</div>
            </div>
		</div>
	<div>
	
		
</div>
@endsection('content')
@section('script')
<script>
$(document).ready(function(){
	
});
</script>
@endsection