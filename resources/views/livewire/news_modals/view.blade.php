
<!-- The Modal -->
<div class="modal " id="myModalView" wire:ignore.self>
  <div class="modal-dialog modal-xl" style="max-height:100vh!important;overflow-y:auto">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">View News</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="row">
            <div class="col-md-3"> <label  for="email">Title</label></div>
            <div class="col-md-9">  {{$title}}</div>
        </div><br>
        <div class="row" wire:ignore>
            <div class="col-md-3"> <label  for="email">Description</label></div>
            <div class="col-md-9"> 
           
         {!! $details !!}
           
      
                </div>
        </div><br>
        <div class="row" >
            <div class="col-md-3"> <label  for="email">Image</label></div>
            <div class="col-md-9">  
             @php
            $src='';
            if(file_exists(storage_path('app/public/news/'.$feature_image))) 
                $src=asset('storage/news/'.$feature_image);
            else
            $src=asset('storage/forum/blank.jpg');

            @endphp
            @if($selected_forum)
            <img src="{{ $src}}" style="width:100px;height:100px;" />
            @endif
            </div>
        </div>
    </div>
    
      <!-- Modal footer -->
      <div class="modal-footer text-right">
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>