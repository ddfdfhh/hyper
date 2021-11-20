<div wire:ignore>
<style>
   .bt{
   top: 23px;
   right: 15px;
   position: absolute;
   border: 0;
   box-shadow: 1px 1px 0px 1px silver;
   border-radius: 5px;
   }
   #bt1{
   bottom: 200px;
   right: 15px;
   position: absolute;
   border: 0;
   box-shadow: 1px 1px 0px 1px silver;
   border-radius: 5px;
   opacity:0;
   }
</style>
<link rel="stylesheet" href="{{asset('css/cropper.min.css')}}"/>
<script src="{{asset('js/cropper.min.js')}}"></script>
@include('alert-comp')
<div>
<img src="{{$banner}}" id="output" class="w-100" alt="Banner image" style="max-width:100%;min-height:94px!important;">
</div>
<!--<form wire:submit.prevent="save">-->
<!--   <input type="file" style="opacity:0" name="banner" id="fi" onchange="d()"  />-->
<!--   <button type="button" class="bt" onclick="document.querySelector('#fi').click()">-->
<!--   <span  ><i class="fa fa-camera"></i> Edit Cover Photo </span>-->
<!--   <span wire:loading><i class="fa fa-spinner fa-spin"  style="font-size: 18px;" ></i></span>-->
<!--   </button>-->
<!--   <button type="submit" id="bt1"><i class="fa fa-thumbs-up"></i> Confirm Banner</button>-->
<!--</form>-->
<div wire:ignore.self class="modal fade" id="modal"  data-backdrop="static" data-keyboard="false" style="max-height:100vh" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-fullscreen" role="document" style="max-height:100vh;margin:10px;width:100%">
   <div class="modal-content" style="max-height:100vh">
      <div class="modal-header">
         <h5 class="modal-title" id="modalLabel">Crop Banner</h5>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
      </div>
      <div class="modal-body">
         <div class="img-container">
            <div class="row">
               <div class="col-md-12" style="max-height:600px;overflow-y:auto">
                  <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" style="width:100%">
               </div>
               <div class="col-md-12">
                  <div class="preview"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
         <button type="button" class="btn btn-primary" id="crop">Crop</button>
      </div>
   </div>
   </div></div>
   @push('scripts')
   <script>
   
   var cropper;
     var canvas=null;
       function d(){
              
               let file = document.querySelector('input[type="file"]').files[0]
               var image = document.getElementById('image');
               image.src = URL.createObjectURL(file);
               var $modal = new bootstrap.Modal(document.getElementById("modal"), {});
               $modal.show();
            
            
            
               $('#modal').on('shown.bs.modal', function () {
              
            cropper = new Cropper(image, {
            
               viewMode: 3,
               preview: '.preview',
                 
               });
            
               }).on('hidden.bs.modal', function () {
               
                        cropper.reset();
                       
               });
     
     }
     document.addEventListener('livewire:load', function () {
     
     $("#crop").click(function(){
         $("#fi").prop('disabled',true)
            $("#fi").attr('disabled',true)
        canvas = cropper.getCroppedCanvas();
       canvas.toBlob(function(blob) {
      url = URL.createObjectURL(blob);
      var reader = new FileReader();
      reader.readAsDataURL(blob); 
      reader.onloadend = function() {
      var base64data = reader.result; 
     
     output.src=base64data;
      @this.base=base64data
      @this.save();
     
      $('#modal').modal('hide');
      }})
      });
});
window.addEventListener('banner-saved',function(){
    console.log('banner saved');
    location.reload();
});
   </script>
   @endpush
</div>