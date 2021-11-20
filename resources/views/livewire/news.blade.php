<div>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

            @include('livewire.news_modals.modal')
           
<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            @include('alert-comp')
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
                        <div >
                       
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Create Announcement
            </button>
                        </div>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Description</th>
									<th>Image</th>
                                     <th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @if($news)
                                @foreach($news as $r)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$r->title}}</td>
                                 <td>{!! \Str::limit(strip_tags($r->details),20,'...<br><br><a href="'.route('admin.news.view',['id'=>$r->id]).'">Read More</a>') !!}</td>
                                 <td>
                                 @php
                               $src='';
                                if($r->featured_image && file_exists(storage_path('app/public/news/'.$r->featured_image))) 
                                 $src=asset('storage/news/'.$r->featured_image);
                               
                               @endphp
                             @if($src)
                              <img src="{{ $src}}" style="width:100px;height:100px;border-radius:0" />
                              @endif
                                 </td>
                               <td>{{\App\Helpers\Helper::instance()->dateFormat($r->created_at) }}</td>
                               <td>
                               <a href="{{route('admin.news.view',['id'=>$r->id])}}" type="button" class="btn btn-info text-white btn-xs"><i class="fa fa-eye"></i></a>
                               <a href="{{route('admin.news.edit',['id'=>$r->id])}}" type="button" class="btn btn-info text-white btn-xs"><i class="fa fa-edit"></i></a>
                                <button type="button" wire:click="delete({{$r->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>


                               </td>
                    </tr>
                                @endforeach
                                @endif
                    </tbody>
						
						</table>
					</div>
				</div>
            </div>
		</div>
	<div>
                    </div>

                    @push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
                    <script>
                       $(document).ready(function() {
  $('#summernote').summernote({
     tabsize: 2,height:250,
     callbacks: {
          onChange: function(contents, $editable) {
          @this.set('details', contents);
      }
   }
});
});
window.addEventListener('forum-done',function(){
   $('#summernote').summernote('reset');
   $('form').trigger('reset');
});
                       </script>
   
@endpush