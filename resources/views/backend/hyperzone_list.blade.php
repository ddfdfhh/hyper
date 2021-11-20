@extends('backend.layouts.layout')
@section('content')
<link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet" />
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
           
            <div class="row">
                <div class="col-md-12">
                <form class="form-inline pull-right" method="GET" action="{{route('admin.search.hyperzones')}}">
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
                        <th>Phone No</th>
                        <th>Category</th>
                        <th>Images</th>
                        <th>Video</th>
                        <th>Status</th>
                      
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if($list)
                     @foreach($list as $r)
                     <tr>
                      <td>{{ (\Request::get('page', 1) - 1) * 10 + $loop->index + 1 }}</td>
                          <td>{{ucfirst($r->name)}}</td>
                        <td>{{$r->email}}</td>
                        <td>{{$r->phoneno}}</td>
                        <td>{{ucwords(str_replace("-",' ',$r->category))}}</td>
                        <td>
                            @if($r->image1 && file_exists(storage_path('app/public/hyperzone/images/'.$r->image1)))
                            <a data-lightbox="roadtrip-{{$r->id}}" data-title="Image 1" href="{{asset('storage/hyperzone/images/'.$r->image1)}}">
                               <img src="{{asset('storage/hyperzone/images/'.$r->image1)}}" style="width:100px!important;height:100px;border-radius:50%!important" />
                            </a>
                            @endif
                            @if($r->image2 && file_exists(storage_path('app/public/hyperzone/images/'.$r->image2)))
                            <a data-lightbox="roadtrip-{{$r->id}}" data-title="Image 2" href="{{asset('storage/hyperzone/images/'.$r->image2)}}" download>
                               <img src="{{asset('storage/hyperzone/images/'.$r->image2)}}" style="width:100px!important;height:100px;border-radius:50%!important" />
                            </a>
                            @endif
                            @if($r->image3 && file_exists(storage_path('app/public/hyperzone/images/'.$r->image3)))
                            <a data-lightbox="roadtrip-{{$r->id}}" data-title="Image 3" href="{{asset('storage/hyperzone/images/'.$r->image3)}}" download>
                               <img src="{{asset('storage/hyperzone/images/'.$r->image3)}}" style="width:100px!important;height:100px;border-radius:50%!important" />
                            </a>
                            @endif
                        </td>
                        <td>
                        @if($r->video && file_exists(storage_path('app/public/hyperzone/videos/'.$r->video)))
                            <a  href="{{asset('storage/hyperzone/videos/'.$r->video)}}" download>
                               <video controls src="{{asset('storage/hyperzone/videos/'.$r->video)}}" width='200' height='200' />
                                    </video>
                            </a>
                            @endif
                        </td>
                        <td>
                            <span class="{{($r->status=='Approved')?'text-success':'text-danger'}}">{{$r->status}}</span></td>
                        <td>
                            <div class="d-flex">
                           
                                @if($r->status=='Pending')
                                 <form action="{{route('admin.hyperzone.update')}}" method="post">
                                    @csrf
                                <input type="hidden" value="{{$r->id}}" name="id"/>
                                <input type="hidden" value="Approved" name="status"/>
                                <button  class="btn btn-success btn-xs btn-icon  mr-2"><i class="fa fa-check"></i></button>
                                </form>
                              <form action="{{route('admin.hyperzone.update')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$r->id}}" name="id"/>
                                 <input type="hidden" value="Rejected" name="status"/>
                                <button  class="btn btn-danger btn-xs btn-icon"><i class="fa fa-ban"></i></button>
                                </form>
                                @endif
                                @if($r->status=='Approved')
                                  <form action="{{route('admin.hyperzone.update')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$r->id}}" name="id"/>
                                <input type="hidden" value="Rejected" name="status"/>
                                <button  class="btn btn-danger btn-xs btn-icon"><i class="fa fa-ban"></i></button>
                                </form>
                                @endif
                                  @if($r->status=='Rejected')
                                    <form action="{{route('admin.hyperzone.update')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$r->id}}" name="id"/>
                                <input type="hidden" value="Approved" name="status"/>
                                <button  class="btn btn-success btn-xs btn-icon"><i class="fa fa-check"></i></button>
                                </form>
                                @endif
                                
                                 
                            
            </div>
                        </td>
                     </tr>
                     @endforeach
                     @endif
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
</div>
@push('scripts')
<script src="{{asset('js/lightbox.min.js')}}"></script>

    @endpush
@endsection