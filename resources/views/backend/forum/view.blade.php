@extends('backend.layouts.layout')
@section('content')
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

 
                <div class="row">
            <div class="col-md-3"> <label  for="email"><b>Title</b></label></div>
            <div class="col-md-9">  {{$f->title}}</div>
        </div><br>
        <div class="row" wire:ignore>
            <div class="col-md-3"> <label  for="email"><b>Description</b></label></div>
            <div class="col-md-9"> 
           
         {!! $f->details !!}
           
      
                </div>
        </div><br>
        <div class="row" >
            <div class="col-md-3"> <label  for="email"><b>Image</b></label></div>
            <div class="col-md-9">  
             @php
            $src='';
            if($f->featured_image && file_exists(storage_path('app/public/forum/'.$f->featured_image))) 
                $src=asset('storage/forum/'.$f->featured_image);
           

            @endphp
           @if($src)
            <img src="{{ $src}}" style="width:100%"/>
          @endif
            </div>
        </div>

                </div>
</div>
</div></div>
	
		
</div>


@endsection