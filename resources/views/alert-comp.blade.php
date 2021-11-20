
    @if (session()->has('message_comp'))
 <div class="alert alert-success alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Success! </strong>
{{session('message_comp')}}</div>
       
    @endif
    @if (session()->has('error_comp'))
 <div class="alert alert-danger alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Error! </strong>
{{session('error_comp')}}</div>
       
    @endif
 
  
 @if ($errors->component->any())
    
    <div class="alert alert-danger alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Error! </strong>
{{$errors->component->first()}}</div>
   
@endif
@if (session()->has('error'))
 <div class="alert alert-danger alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Error! </strong>
{{session('error')}}</div>
       
    @endif
    @if ($errors->any())
    
     <div class="alert alert-danger alert-icon"><em class="icon ni ni-check-circle"></em> 
<strong>Error! </strong>
 {{$errors->first()}}</div>
    
 @endif