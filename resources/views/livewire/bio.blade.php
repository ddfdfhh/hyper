 <div class="abt_profile" style="word-break: break-word;">
                   <h5 style="text-align:center;">Bio <a href="javascript:void(0)" class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#UpdateBio"></i></a></h5>
                  <p style="text-align:justify;font-size:13px;">{{$bio}}
                  </p>
                         
                         <div class="modal fade" id="UpdateBio" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true" style="color:#000;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>Update Bio</h5>
                                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class='alert alert-danger col-md-12 profileerror' style="display:none;text-align: left;"></div>
                                   <form class="ewf-us-form" wire:submit.prevent="save">
                                       @csrf
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                   
                                                    <textarea  class="form-control" wire:model.defer='bio' name="bio" placeholder="Enter maximum 500 words about you.."></textarea>
                                                </div>
                                            </div>
                                           <div class="col-md-12 text-end mt-4"><button  class="btn btn-success follow_btn"  >Submit</button></div>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                           
           
 </div>