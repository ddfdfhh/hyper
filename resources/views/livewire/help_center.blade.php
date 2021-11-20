<div>
    
       @include('alert-comp')
              <form wire:submit.prevent="sendmail">                     
        <div class="row">
             <div class="col-md-6 ">
                <div class="form-group row">
                    <div class="col-md-3 mb-3"> <label>Name</label></div>
                     <div class="col-md-9 "><input  class="form-control" wire:model.defer="name" name="name"></div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group row mb-3">
                    <div class="col-md-3 "><label> E-mail</label></div>
                   <div class="col-md-9 "> <input type="email" class="form-control" wire:model.defer="email" name="email"></div>
                </div>
            </div>
           
              <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-md-3 "><label>Query</label></div>
                   <div class="col-md-9 "> <textarea  class="form-control" wire:model.defer="query" name="query"></textarea></div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group row">
                    <div class="col-md-3 "><label>File </label></div>
                    <div class="col-md-9 "><input  type="file" class="form-control" wire:model.defer="file" name="file"></div>
                </div>
            </div>
            
            

            <div class="col-md-12 text-end mt-4"><button  type="submit"  class="btn btn-success follow_btn" >Submit</button></div>
        </div>
        </form>
    
</div>