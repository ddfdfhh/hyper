@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Users </a></li>
      <li class="breadcrumb-item active" aria-current="page">User list</li>
   </ol>
</nav>
<div>
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            {{--
            <h6 class="card-title">Hoverable Table</h6>
            <p class="card-description">Add class <code>.table-hover</code></p>
            --}}
             @if (Session::has('successmessage'))
             <div class="alert alert-success alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Success! </strong>
{{ Session::get('successmessage') }}</div>
            @endif 
            @if (Session::has('errormessage'))
          
             <div class="alert alert-danger alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Success! </strong>
{{ Session::get('errormessage') }}</div>
            @endif  
            @if($cur_moderator)
            <p><span class="badge badge-success">Curent Moderator Name</span>- {{ucfirst($cur_moderator->name)}} </p>
            <p><span class="badge badge-success">Curent Moderator Email</span>- {{($cur_moderator->email)}} </p>
            @endif
            <div class="row">
                <div class="col-md-12">
                <form class="form-inline pull-right" method="GET" action="{{route('admin.search.users')}}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="term" placeholder="Search by name or email">
                    </div>
                    
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
               <div >
               </div>
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                      
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if($user_list)
                     @foreach($user_list as $r)
                     <tr>
                       <td>{{ (\Request::get('page', 1) - 1) * 10 + $loop->index + 1 }}</td>
                        <td>{{ucfirst($r->name)}}</td>
                        <td>{{$r->email}}</td>
                        <td>
                            <span class="{{($r->status=='Active')?'text-success':'text-danger'}}">{{$r->status}}</span></td>
                        <td>
                            <div class="d-flex">
                            <form action="{{route('admin.assign.moderator')}}" method="post" style="margin-right:5px">
                                @csrf
                                <input type="hidden" value="{{$r->id}}" name="id"/>
                                 <button  class="btn btn-success btn-xs">Set moderator</button>
                            </form><br>
                             <form action="{{route('admin.mute.user')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$r->id}}" name="id"/>
                                 <button  class="btn btn-warning btn-xs">{{ ($r->status=='Active')?'Mute':'Unmute' }}</button>
                            </form>
            </div>
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
                  <tfoot>
								<th colspan="6">{{ $user_list->links() }}</th>
							</tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div>
   </div>
</div>
<script>
    function confirmDelete(id){
        if(confirm('Are you sure want to delete ?')){
            location.href='/admin/chats/'+id;
        }
    }
    </script>
@endsection