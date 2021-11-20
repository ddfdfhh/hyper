@extends('backend.layouts.layout')
@section('content')
<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
          {{--<div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
              <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
              <input type="text" class="form-control">
            </div>
            <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
              <i class="btn-icon-prepend" data-feather="download"></i>
              Import
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download Report
            </button>
          </div>--}}
        </div>

                 

        
        <div class="row">
          <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Users</h6>
                  <div class="dropdown mb-2">
                      <a href="{{ route('users.export') }}"><button class="btn p-0" type="button">Download Data With CSV File</button></a>
                      <a href="{{ route('users.index') }}"><button class="btn p-0" type="button">View All</button></a>
                      {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                    </div>--}}
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Serial No.</th>
			<th>Username</th>
			<th>Email</th>
                        <th>Hymeteor Wallet Address</th>
			<th>Joining Date</th>
			<th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @php $i=1; @endphp
                     @forelse($users as $user)
                     <tr>
                        <td>{{ $i }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
                        <td>{{ $user->hyper_code }}</td>
			<td>{{ Helper::instance()->dateFormat($user->created_at) }}</td>
			<td>@if($user->published == 1){{ 'Active' }}@else{{ 'Deactive' }}@endif</td>
                        <th>
                            <a href="{{ route('users.show', $user->id) }}">
                                <button type="button" class="btn btn-primary btn-icon" title="View Customer">
				<i data-feather="eye"></i>
				</button>
                            </a>
										
                            <a href="{{ route('users.edit', $user->id) }}">
                            <button type="button" class="btn btn-warning btn-icon"title="View Order List">
                                <i data-feather="edit"></i>
                            </button>
                            </a>
                        </th>
                      </tr>
                      @php ++$i; @endphp
                     @empty
                     @endforelse
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->

			</div>
@endsection('content')