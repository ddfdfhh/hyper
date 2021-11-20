@extends('backend.layouts.layout')
@section('content')
<link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet" />

<div class="page-content">
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Chats</a></li>
      <li class="breadcrumb-item active" aria-current="page">Chat list</li>
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
            <div class="table-responsive">
               <div >
               </div>
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Message</th>
                        <th>Attachment</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if($chat_list)
                     @foreach($chat_list as $r)
                     <tr>
                           <td>{{ (\Request::get('page', 1) - 1) * 10 + $loop->index + 1 }}</td>
                    
                        <td>{{ucfirst($r->user->name)}}</td>
                        <td>{{ucfirst($r->to_user->name)}}</td>
                        <td>{!! $r->message !!}</td>
                        <td>
                           @if($r->file)
                           @php 
                           $ext=explode('.',$r->file)[1];
                           //dd($ext);
                           $is_image=false;$is_video=false;
                           if(in_array($ext,['png','jpg','jpeg','gif','webp']))
                           $is_image=true;
                           elseif(in_array($ext,['mp4','avi']))
                           $is_video=true;
                           @endphp
                           <div>
                              <a data-lightbox="roadtrip-{{$r->id}}" href="{{asset('storage/chat/'.$r->file)}}" download>
                                 @if($is_image)
                                 <img  src="{{asset('storage/chat/'.$r->file)}}" alt="your image" style="width:50px!important;height:50px;"/>
                                 @elseif($is_video)
                                 <video width="300" height="200" src="{{asset('storage/chat/'.$r->file)}}" controls  >
                                    Your browser does not support the video tag.
                                 </video>
                                 @else
                                 <span>&#128206; {{$r->file}}</span>
                                 @endif
                              </a>
                           </div>
                           @endif
                        </td>
                        <td>
                           <span class="badge badge-{{$r->status==1?'success':'danger'}}" >{{$r->status!=1?'Disabled':''}}</span>
                        </td>
                        <td>{{\App\Helpers\Helper::instance()->dateFormat($r->created_at) }}</td>
                        <td>
                            @if($r->status==1)
                           <a  href="javascript:confirmDelete({{$r->id}},0)"><button class="btn btn-danger btn-icon"><i class="fa fa-ban"></i></button></a>
                           @else
                             <a  href="javascript:confirmDelete({{$r->id}},1)"><button class="btn btn-success btn-icon"><i class="fa fa-check"></i></button></a>
                         
                           @endif
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
                  <tfoot>
								<th colspan="6">{{ $chat_list->links() }}</th>
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

<script>

    function confirmDelete(id,status){
        if(confirm(`Are you sure want to ${status===1?'enable':'disable'}?`)){
            location.href='/hyper/admin/chat_del/'+id+'/'+status;
        }
    }
    </script>
    
    @endpush
@endsection