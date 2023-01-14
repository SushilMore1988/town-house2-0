@extends('front.layouts.app')

@section('css')
	
@endsection

@section('content')
    @livewire('co-work.listing.payment', ['cws' => $cws, 'selectedPackageId' => $request->selectedPackageId])
@endsection

@section('js')
	
	<script type="text/javascript">
		$(document).on('click', '.apply-code', function(){
		if(!$('input[type=text][name=promo-code]').val()){
		toastr.error('Please enter promo code!', 'Error!');
		return false;
		}
		var code = $('input[type=text][name=promo-code]').val();
		$.ajax({
		url : '{{ url('/apply-code') }}/'+code,
		type : 'GET',
		success: function(data) { 
			if(data.status == 'success'){
			$('#apply-code').hide();
			$('.appliedBtn').append('<button type="button" class="btn btn-success n-bold f-9 rounded-0 mx-auto pr-2 text-center justify-content-center w-100">Applied</button>');
			promo_code = data.code;
			$('#promo_code').val(promo_code);
			discount = data.discount;
			discount_type = data.discount_type;
			if(discount_type == "Money"){
				total = $(".total-amount").val() - discount;
				$(".total-amount").text(total);
				$(".total-amount").val(total);
			}else{
				total = ($("input[type=hidden][name=price]").val() - ((($("input[type=hidden][name=price]").val() * discount) / 100)));
				$(".total-amount").text(total);
				$("input[type=hidden][name=price]").val(total);
			}
			$('#promo_code_type').val(data.discount_type);
			$('#promo_code_discount').val(discount);
			toastr.success('Promo code applied successfully', 'Success!');

			}else{
			toastr.error('Please check promo code!', 'Error!');
			}
				},
				error: function(data){
				toastr.error('Error in applying promo code!', 'Error!');
				}
		});
	});
	</script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script type="text/javascript">
	/**
         * RazorPay Event listner
        */
        window.addEventListener('payUsingRazorPay', event => {
        //   console.log(event.detail.listingPayment);
          var amount = parseFloat(event.detail.listingPayment.amount);
          var total_amount = parseInt(amount * 100);
          var options = {
            "key": "{{ env('RAZOR_KEY') }}",
            "amount": total_amount,
            "currency": "INR",
            "name": "TH2.0",
            "description": "TH2.0 Co-work Space Booking",
            "image": "https://th2-0.com/img/logo.svg",
            "order_id": "", 
            "handler": function (response){
              $('#razorpay_payment_id').val(response.razorpay_payment_id);
              $('#razorpay_amount').val(amount);
              $('#cws_listing_payment_id').val(event.detail.listingPayment.id);
              $('#amount').val(event.detail.listingPayment.amount);
              $('#razorpay-form').submit();
            },
            "prefill": {
              "name": "{{Auth::user()->name}}",
              "email": "{{Auth::user()->email}}",
              "contact": "{{Auth::user()->phone}}"
            },
            "notes": {
              "address": ""
            },
            "theme": {
              "color": "#F37254"
            }
          };
          var rzp1 = new Razorpay(options);
          rzp1.open();
        });
	</script>
@endsection