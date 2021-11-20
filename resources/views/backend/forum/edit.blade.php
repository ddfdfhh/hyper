@extends('backend.layouts.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Forum</a></li>
			<li class="breadcrumb-item active" aria-current="page">View</li>
		</ol>

	</nav>
	<div>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
           
				<div class="card-body">
<form method="post" action="{{route('admin.forum.update',['id'=>$f->id])}}" class="form" enctype="multipart/form-data">
    @method('PUT')
    @csrf
                @include('alert-comp')
        <div class="row">
            <div class="col-md-3"> <label  for="email">Title</label></div>
            <div class="col-md-9"> 
                 <input type="text" name="title" value="{{$f->title}}" class="form-control" id="email">
                 <input type="hidden" name="old_feature_image" value="{{$f->featured_image}}" class="form-control" >
                </div>
        </div><br>
        <div class="row" >
            <div class="col-md-3"> <label  for="email">Description</label></div>
            <div class="col-md-9"> 
             <textarea  name="details"  rows='60' class="form-control" id="summernote"></textarea>
      
                </div>
        </div><br>
        <div class="row" >
            <div class="col-md-3"> <label  for="email">Image</label></div>
            <div class="col-md-9">  
            <input type="file" name="feature_image"   class="form-control" >
            @php
            $src='';
            if($f->featured_image && file_exists(storage_path('app/public/forum/'.$f->featured_image))) 
                $src=asset('storage/forum/'.$f->featured_image);
            
            @endphp
           
          @if($src)
            <img src="{{ $src}}" style="width:100px;height:100px;"/>
          @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

</form>

                </div>
</div>
</div></div>
	
		
</div>

@push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
                    <script>
                       $(document).ready(function() {
  $('#summernote').summernote('code',`{!! $f->details !!}`);
});

                       </script>
   
@endpush
@endsection