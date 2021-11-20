<div class="tab_box_sec padd-sec">
    @include('alert-comp')
    <style>
        .select2-results__options li{
color:black!important;
        }
        .select2-selection__choice{
            background:blue!important;
        }
        </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <form wire:submit.prevent="setSelected" wire:ignore>
                    
                        <div class="row justify-content-center">
                        <div class="col-md-12 mb-3">
                            <form class="form_hyperzone">
                                <div class="row">
                                   
                                    <div class="col-md-6 mb-3">
                                    <label class="form-label">Maximum 3 followers allowed</label>
                                    <select   id="select"  name="selected" class="form-control" placeholder="..." >
                                        
                                    @foreach($users as $r)
                                    <option selected value="{{$r->info->id}}">{{ucfirst($r->info->name)}}</option>
                                    @endforeach
                                
                                </select>
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
                    
                    
                </div>
</form>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script> -->
<script>
    $('#select').select2({
         placeholder: "Select members",
        allowClear: true,
        multiple: true,
        minimumInputLength: 3 ,
        maximumSelectionLength: 3,
         formatSelectionTooBig: function (limit) {
                 return 'Free members allowed maximum 3 selections';
         },
        ajax: {
            url: '/hyper/user/getUsers',
            dataType: 'json',
            delay: 250,
           
            processResults: function (data) {
                console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.info.name,
                            id: item.info.id
                        }
                    })
                };
            },
           cache: true
            
        }
});
$('#select').on('change', function (e) {
     let data = $(this).val();
     console.log(data);
       @this.set('selected', data);
  });
    window.livewire.on('productStore', () => {
        $('#select').select2();
    });
    </script>

@endpush
                        </div>