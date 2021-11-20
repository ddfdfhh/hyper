@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Forum</a></li>
			<li class="breadcrumb-item active" aria-current="page">Forum list</li>
		</ol>

	</nav>
	@livewire('forum')
	
		
</div>


@endsection