<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}" ></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}" ></script>
<script src="{{ asset('assets/frontend/js/jquery.smartmenus.min.js') }}" ></script>
<script src="{{ asset('assets/frontend/js/Function.js') }}" ></script>
@yield('script')
<script>
$(document).ready(function(){
    $('#tokenRegister').trigger('click');
});

/*token registration form*/
function submittokenRegistration(){
    var url = '{{ url('user/dashboard') }}';
    $.ajax({
        type:"POST",
        url:'{{ route('token.register') }}',
        data:$('#tokenRegistration').serialize(),
        success: function(data){
            if($.isNumeric(data) && data == 1){
                $('.tokenerror').removeClass("tokencss");
                $('.tokenerror').addClass("alert-success");
                $('.tokenerror').html('Your hymeteor wallet address has been verified and registration has successfully completed');
                $('.tokenerror').show();
                +$('#tokenRegistration')[0].reset();
                setTimeout( function(){ 
                    window.location = url;
                }  , 3000 );
            }else if($.isNumeric(data) && data == 2){
                $('.tokenerror').removeClass("tokencss");
                $('.tokenerror').addClass("alert-success");
                $('.tokenerror').html('Registration has successfully completed but your hymeteor wallet address is not matched, Our customer representative will coordinate soon.');
                $('.tokenerror').show();
                $('#tokenRegistration')[0].reset();
                
                /*setTimeout( function(){ 
                    window.location = url;
                }  , 3000 );*/
            }else{
                $('.tokenerror').html(data);
                $('.tokenerror').show();
            }
        }
    });
}

function submittokenPresale(){
    var login = '{{ url('login') }}';
    var cart = '{{ route('user.dashboard') }}';
    var amount = $('#presaleform_amount').val();
    if(amount != '') getethereumValue(amount);
    
    setTimeout( function(){ 
        $.ajax({
            type:"POST",
            url:'{{ route('storecart') }}',
            data:$('#tokenPresaleForm').serialize(),
            dataType:'json',
            success: function(data){
                console.log(data);
               if(data.error){
                   //location.href='{{URL::to('redirecttologin')}}/'+amount
                     $('.tokenPresaleFormrror').html(data.error);
                    $('.tokenPresaleFormrror').show();
               }
                if(data.success){
                    location.href = data.success;
                }
            }
        });
    }  , 1000 );
}
function getethereumValue(el){
    if(el != ''){
        var tokenvalue = '{{ Helper::instance()->general_settings('hymeteor_token')->hymeteor_token }}';
        var token = parseFloat(el) / parseFloat(tokenvalue);
        token = token.toFixed(6)
        $('#presaleform_hymeteortoken').val(token);

        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", "https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH", false ); // false for synchronous request
        xmlHttp.send( null );
        const txt = xmlHttp.responseText;
        const obj = JSON.parse(txt);
        var price = parseFloat(el) * parseFloat(obj.ETH);
        price = price.toFixed(6);
        $('#presaleform_ethereum').val(price);
        if(price > 1) $('#presaleSubmit').attr('disabled', true);
        else  $('#presaleSubmit').attr('disabled', false);
        //console.log(obj.USD);
        //return xmlHttp.responseText;
    }else{
        $('#presaleform_ethereum').val('');
        $('#presaleform_hymeteortoken').val('');
    }
    
}


var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

copyTextareaBtn.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('#presaleform_yourwallet');
  copyTextarea.focus();
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
});
</script>