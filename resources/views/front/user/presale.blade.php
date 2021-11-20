@extends('front.layouts.userlayout')
@section('content')
<section class="profile_info mt-5">
        <div class="container">
          <div class="row">
                @if (Session::has('successmessage'))
                    <div class='alert alert-info error text-success'>{{ Session::get('successmessage') }}</div>
		@endif 
                @if (Session::has('salemessage'))
                    <div class='alert alert-info error text-success'>{{ Session::get('salemessage') }}</div>
		@endif 
		@if (Session::has('errormessage'))
                    <div class='alert alert-danger error text-danger'>{{ Session::get('errormessage') }}</div>
		@endif
                
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="profile_right_info">
                            <table class="">
                                <thead>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Ethereum Value</th>
                                        <th>Hymeteor Unity Token</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                      @forelse($list as $detail)
                                      <tr>
                                          <td>${{ $detail->amount }}</td>
                                          <td>{{ $detail->ethereum }}</td>
                                          <td>{{ $detail->hyper_token }}</td>
                                          <td>@if($detail->published == 1){{ 'Done' }}@elseif($detail->published == 0){{ 'Pending' }}@endif</td>
                                      </tr>
                                      @empty
                                      <tr>
                                          <td colspan="4"><div class="alert alert-warning">There is no record.</div></td>
                                      </tr>
                                      @endforelse
                                  </tbody>
                              </table>
                        </div>

              </div>
              
             
                   
                   
                     
            </div>
          </div>
       
       </section>
<div class="col-md-6 text-center imagepreview" style="position: absolute;z-index: 99999999999999999999999999;display:none;"><img src="{{ url('/assets/frontend/images/loader.gif') }}"></div>
@endsection

@section('script')
<script>
    
</script>
@endsection