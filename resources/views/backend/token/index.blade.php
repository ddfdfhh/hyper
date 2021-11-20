@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('token-request.index') }}">Token Request</a></li>
			<li class="breadcrumb-item active" aria-current="page">Token Request list</li>
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
									<th>Username</th>
									<th>Email</th>
									<th>Amount (USD)</th>
                                                                        <th>Ethereum</th>
                                                                        <th>Hyper Token</th>
                                                                        <th>Payment Mode</th>
                                                                        <th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@php $i=1; @endphp
							
							@foreach($list as $detail)
							
								<tr>
									<th>{{ $i }}</th>
									<td>{{ $detail->user->name }}</td>
									<td>{{ $detail->user->email }}</td>
									<td>{{ $detail->amount }}</td>
                                                                        <td>{{ $detail->ethereum }}</td>
                                                                        <td>{{ $detail->hyper_token }}</td>
                                                                        <td>{{ $detail->payment_mode }}</td>
                                                                        <td>@if($detail->published == 1){{'Done'}}@elseif($detail->published == 2){{'Deactive'}}@else{{ 'Pending' }}@endif</td> 
                                                                        <td>
                                                                            <a href="{{ route('token-request.edit', $detail->id) }}">
                                                                                    <button type="button" class="btn btn-warning btn-icon" title="View Customer">
											<i data-feather="edit"></i>
										</button>
										</a>
										
										<a href="{{ route('token-request.destroy', $detail->id) }}">
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