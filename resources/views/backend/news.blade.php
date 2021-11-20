@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Announcements</a></li>
			<li class="breadcrumb-item active" aria-current="page">Announcement list</li>
		</ol>

	</nav>
	@livewire('news')
	
		
</div>


@endsection