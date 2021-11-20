 <div class="profile_right_info">
                         <a href="javascript:void(0)"  style="font-size:21px" class="edit_profile"><i class="fa fa-pencil-square-o" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#UpdateModal1"></i></a>
                         
                         <div class="modal fade" id="UpdateModal1" tabindex="-1"  aria-labelledby="UpdateModalLabel" aria-hidden="true" style="color:#000;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>Update Profile</h5>
                                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    @include('alert-comp')
                                   
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>Enter E-mail</label>
                                                    <input type="email" class="form-control" wire:model.defer="detail1.email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hymeteor Wallet Address</label>
                                                    <input type="text" class="form-control" wire:model.defer="detail1.hyper_code" name="hyper_code" >
                                                </div>
                                            </div>
                                              
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Password</label>
                                                    <input type="password" class="form-control" wire:model.defer="password" name="password">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" wire:model.defer="password_confirmation" name="password_confirmation">
                                                </div>
                                            </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> Date Of Birth</label>
                                                    <input type="date" class="form-control" wire:model.defer="detail1.dob" name="dob">
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-end mt-4"><button  type="button" wire:click.prevent="save" class="btn btn-success follow_btn" >Submit</button></div>
                                        </div>
                                
                                  </div>
                                </div>
                              </div>
                            </div>
                          <table>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>{{ $detail1->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $detail1->email }}</td>
                        </tr>
                        <tr>
                            <td>Hyper Address</td>
                            <td>:</td>
                            <td>@if($detail1->hyper_code){{ $detail1->hyper_code }}@else{{'NA'}}@endif</td>
                        </tr>
                        <tr>
                            <td>Date of birth </td>
                            <td>:</td>
                            <td>@if($detail1->dob){{ Helper::instance()->dateFormat($detail1->dob) }}@else{{'NA'}}@endif</td>
                        </tr>
                       
                    </tbody>
                </table>
                        </div>