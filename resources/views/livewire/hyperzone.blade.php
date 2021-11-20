<div class="tab_box_sec padd-sec">
    @include('alert-comp')
    <style>
        .box_comp_upload,.box_comp_img_upload{
              min-height:200px!important;
               
        }
         .box_comp_upload img{
              min-height:200px!important;
             
        }
    </style>
    <form wire:submit.prevent="save">
                           <ul class="nav nav-tabs" id="myTab" role="tablist" style="flex-wrap:unset!important">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link @if($category=='mobile-capture') active @endif " wire:click="selectCat('mobile-capture')"   id="Upload-tab" data-bs-toggle="tab" data-bs-target="#Upload" type="button" role="tab" aria-controls="Upload" aria-selected="true">Mobile Capture</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link @if($category=='telescope-capture') active @endif " id="Creative-tab" wire:click="selectCat('telescope-capture')"   data-bs-toggle="tab" data-bs-target="#Creative" type="button" role="tab" aria-controls="Creative" aria-selected="false">Telescope Capture  </button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link @if($category=='enhanced-imagery') active @endif " id="Scientific-tab"   wire:click="selectCat('enhanced-imagery')" data-bs-toggle="tab" data-bs-target="#Scientific" type="button" role="tab" aria-controls="Scientific" aria-selected="false">Enhanced Imagery</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link @if($category=='what-was-that') active @endif " id="Unknown-tab"  wire:click="selectCat('what-was-that')"  data-bs-toggle="tab" data-bs-target="#Unknown" type="button" role="tab" aria-controls="Unknown" aria-selected="false">What Was That?</button>
                              </li>
                           </ul>
                           <div class="tab-content mt-4" id="myTabContent">
                              <div class="tab-pane fade show active" id="Upload" role="tabpanel" aria-labelledby="Upload-tab">
                                 <div class="row justify-content-center">
                                    <div class="col-md-12 mb-3">
                                       <form class="form_hyperzone">
                                          <div class="row">
                                             <div class="col-md-12 mb-3">
                                                <label class="form-label">Userame</label>
                                                <input type="text" wire:model.defer="name" name="name" class="form-control" placeholder="Your userame...">
                                             </div>
                                             <!--<div class="col-md-4 mb-3">-->
                                             <!--   <label class="form-label">Email</label>-->
                                             <!--   <input type="text" wire:model.defer="email" name="email" class="form-control" placeholder="Enter Your Email...">-->
                                             <!--</div>-->
                                             <!--<div class="col-md-4 mb-3">-->
                                             <!--   <label class="form-label">Phone Number</label>-->
                                             <!--   <input type="text"  wire:model.defer="phoneno" name="phoneno" class="form-control" placeholder="Enter Your Phone Number...">-->
                                             <!--</div>-->
                                             <div class="col-md-6 mb-3">
                                                <label class="form-label">Upload Images </label>
                                                <input type="file"  multiple wire:model.defer="images" name="images"class="form-control" id="inputGroupFile01">
                                                <span class="form-text">
                                                (max up to 3)
                                                </span>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label class="form-label">Upload Videos </label>
                                                <input type="file" name="video" wire:model.defer="video"class="form-control" id="inputGroupFile01">
                                                <span class="form-text">
                                                (Max 1, Max duration 30 Seconds)
                                                </span>
                                             </div>
                                             <div class="col-md-12 mb-3">
                                                <label class="form-label">Descriptions</label>
                                                <textarea name="details" wire:model.defer="details" class="form-control" placeholder="Leave a Descriptions here" style="height: 100px"></textarea>
                                             </div>
                                             <div class="col-md-12">
                                                 
                                                <button type="submit" class="btn-common" wire:loading.attr="disabled">
                                                    <div wire:loading>
                                                              Please wait
                                                            </div>
                                                <div wire:loading.remove>
                                                                Submit
                                                            </div>
                                                </button>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                    @if($list)
                                    @foreach($list as $r)
                                    @if($r->image1 && file_exists(storage_path('app/public/hyperzone/images/'.$r->image1)))
                                    @php 
                                    $base=asset('storage/hyperzone/images/thumb');
                                     $base1=asset('storage/hyperzone/videos/');
                                    @endphp
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                                       <div class="box_comp_upload">
                                          <a href="{{route('user.hyperzone-single',['id'=>$r->id,'obj'=>$r->image1])}}">
                                             <div class="box_comp_img_upload">
                                                <img src="{{$base.'/'.$r->image1}}" style="width:100%;height:100%;">
                                             </div>
                                             <div class="box_comp_text_upload">
                                                  <h5>{{ucwords(str_replace("-"," ",$r->category))}}</h5>
                                                <p class="mb-0">{{ \Illuminate\Support\Str::limit($r->details, 150, $end=' ...Read More') }}</p>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                    @endif
                                  
                                    @if($r->image2 && file_exists(storage_path('app/public/hyperzone/images/'.$r->image2)))
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                                       <div class="box_comp_upload">
                                          <a href="{{route('user.hyperzone-single',['id'=>$r->id,'obj'=>$r->image2])}}">
                                             <div class="box_comp_img_upload">
<img src="{{$base.'/'.$r->image2}}" style="width:100%;height:100%;">                                             </div>
                                             <div class="box_comp_text_upload">
                                                  <h5>{{ucwords(str_replace("-"," ",$r->category))}}</h5>
                                                <p class="mb-0">{{ \Illuminate\Support\Str::limit($r->details, 150, $end=' ...Read More') }}</p>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                    @endif
                                    @if($r->image3 && file_exists(storage_path('app/public/hyperzone/images/'.$r->image3)))
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                                       <div class="box_comp_upload">
                                          <a href="{{route('user.hyperzone-single',['id'=>$r->id,'obj'=>$r->image3])}}">
                                             <div class="box_comp_img_upload">
                                                <img src="{{$base.'/'.$r->image3}}" style="width:100%;height:100%;">
                                             </div>
                                             <div class="box_comp_text_upload">
                                                <h5>{{ucwords(str_replace("-"," ",$r->category))}}</h5>
                                                <p class="mb-0">{{ \Illuminate\Support\Str::limit($r->details, 150, $end='  ...Read More') }}</p>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                    @endif
                                    @if($r->video && file_exists(storage_path('app/public/hyperzone/videos/'.$r->video)))
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                                       <div class="box_comp_upload">
                                          <a href="{{route('user.hyperzone-single',['id'=>$r->id,'obj'=>$r->video])}}">
                                             <div class="box_comp_img_upload">
                                                <video width="100%" height="100%" controls>
                                                   <source src="{{$base1.'/'.$r->video}}" type="video/mp4">
                                                </video>
                                             </div>
                                             <div class="box_comp_text_upload">
                                                  <h5>{{ucwords(str_replace("-"," ",$r->category))}}</h5>
                                                <p class="mb-0">{{ \Illuminate\Support\Str::limit($r->details, 150, $end='  ...Read More') }}</p>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                 </div>
                              </div>
                             
                           </div>
</form>
                        </div>