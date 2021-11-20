<div wire:ignore.self id="vid"  class="modal fade" role="dialog" style="z-index:1">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="border:1px solid grey">
                     <div class="modal-header">
                    
                           <h4 class="modal-title" style="border:0">Create post</h4>
                       
                        <button type="button" class="close pull-right" style="border-radius: 50%;width: 29px;border: 0;" data-bs-dismiss="modal">&times;</button>
                       
                     </div>

                     <form wire:submit.prevent>
                     <div class="modal-body" >
                        @include('alert-comp')
                        <div class="input_pos1t">
                             <p style="font-size:15px;"><img src="{{ user_pic(auth()->id()) }}" alt="Profile pic" />
                             {{ucfirst(auth()->user()->name)}}</p>
                            
                         </div>
                         <div class="input_post" style="border: 1px solid grey;border-radius: 42px;margin-top: 11px;position:relative;">
                            <input class="f" wire:model.defer="post_content" name="content" wire:keydown.enter="postContent" type="text" placeholder="Post content...">
                            <button id="d" style="opacity:.3;border:none;background:transparent;position: absolute;
    left: 92%;">&#127773;</button>
                           </div>
                        <input type="file" wire:model="video" name="video" id="video_inp" style="visibility:hidden" />
                        <div wire:ignore style="height:200px;overflow-y:hidden;position:relative;border:1px dashed white;cursor:pointer" onclick="document.querySelector('#video_inp').click()">
                          
                           <p style="position:absolute;top:50%;left:50%;font-weight:bold;transform: translate(-50%, -50%);" id="te1">Upload Video</p>
                            <p style="position:absolute;top:63%;left:50%;font-weight:bold;font-size:30px;transform: translate(-50%, -50%);" ><i class="fa fa-cloud-upload"></i></p>
                          <video width="100%" height="auto" controls id="video" style="visibility:hidden;">
                                        Your browser does not support the video tag.
                             </video>
                        
                        </div>
                     </div>
                     <div class="modal-footer" style="border:0!important">
                     <button type="button" style="font-size:13px;" class="follow_btn btn btn-success" id="sub2"  wire:click="postContent" wire:loading.attr="disabled">
                              <span wire:loading.remove>SUBMIT</span>
                              <span wire:loading>Please wait</span>
</button>
                        <a type="button" id="closeme" class="follow_btn" style="background:transparent;color:white" data-bs-dismiss="modal">Close</a>
                     </div>
                      </form>
                  </div>
               </div>
            </div>