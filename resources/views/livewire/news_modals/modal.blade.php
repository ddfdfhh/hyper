
<!-- The Modal -->
<div class="modal " id="myModal" wire:ignore.self>
  <div class="modal-dialog modal-xl" style="max-height:100vh!important;overflow-y:auto">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">@if($selected_news) Edit @else Create @endif News</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form class="form-inline" >
      <!-- Modal body -->
      <div class="modal-body">
          @include('alert-comp')
        <div class="row">
            <div class="col-md-3"> <label  for="email">Title</label></div>
            <div class="col-md-9">  <input type="text" name="title" wire:model.defer="title" class="form-control" id="email" style="width:100%"></div>
        </div><br>
        <div class="row" wire:ignore>
            <div class="col-md-3"> <label  for="email">Description</label></div>
            <div class="col-md-9"> 
 <textarea  name="details"  rows='60' class="form-control" id="summernote"></textarea>
      
                </div>
        </div><br>
        <div class="row" >
            <div class="col-md-3"> <label  for="email">Image</label></div>
            <div class="col-md-9">  
            <input type="file" name="feature_image"  wire:model.defer="feature_image" class="form-control" >
            @php
            $src='';
            if(file_exists(storage_path('app/public/news/'.$feature_image))) 
                $src=asset('storage/news/'.$feature_image);
            else
            $src=asset('storage/forum/blank.jpg');

            @endphp
            @if($selected_news)
            <img src="{{ $src}}" style="width:100px;height:100px;" />
            @endif
            </div>
        </div>
    </div>
    
      <!-- Modal footer -->
      <div class="modal-footer text-right">
      <button type="button"  @if(!$selected_news) wire:click.prevent="store" @else wire:click.prevent="update"  @endif class="btn btn-primary">
         <span wire:loading.remove> Submit</span>
          <div wire:loading >
        Please wait
    </div></button>
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>