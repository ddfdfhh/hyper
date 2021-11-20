<div class="input_post" style="position:relative">

   <img src="{{user_pic(auth()->id())}}" alt="Profile pic" class="profile_pic"/>
    <input id="f"   style="height:40px;border-radius:20px;padding-left:10px;" wire:model.defer="comment_txt" wire:keydown.enter="postComment" class="mt-2 post-input form-control" placeholder="Type here..." />
    <button id="d" style="opacity:.3;border:none;background:transparent;position: absolute;
    left: 87%;top:20px;">&#127773;</button>
</div>
                                