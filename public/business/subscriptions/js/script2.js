let monthlyPrice;
let annualPriceOutter;
let annualPriceInner;
var numberOfUsers;

$(document).ready(function() {

$(window).on('load', function(){
  $('.loading').fadeOut(500);
});



$(window).scroll(function() {
  var scrollTop = $(window).scrollTop();
   if (scrollTop >= 200 ) {
   $('header').addClass("scrolling");
   }
   else{
   $('header').removeClass("scrolling");
   } 
});

$(".nav-link").on('click', function (event) {
  if (this.hash !== "") {
    event.preventDefault();
    var headerHeight = $(".navbar-brand").outerHeight(); 
    var hash = this.hash;
    $('html, body').animate({
      scrollTop: $(hash).offset().top - headerHeight 
    }, 500, function () {
      // window.location.hash = hash
    });
  }
  window.location.hash = hash;
});

$('.nav-link').click(function(){
  $(this).parent('li').addClass('active').siblings().removeClass('active');
  });


$('.main-header .nav-link').on('click', function(){
  $('.navbar-collapse').collapse('hide');
});








var minusButton = $(".spinnerMinus"); //to aquire all minus buttons
var plusButton = $(".spinnerPlus"); //to aquire all plus buttons
var minimumUsers = $('#numberOfUsersLimit').val();


//Handle click
minusButton.click(function() {
  trigger_Spinner($(this), "-", {
    max: 100,
    min: minimumUsers
  }); //Triggers the Spinner Actuator
}); /*end Handle Minus Button click*/

plusButton.click(function() {
  trigger_Spinner($(this), "+", {
    max: 100,
    min: minimumUsers
  }); //Triggers the Spinner Actuator    
}); /*end Handle Plus Button Click*/


 monthlyPrice = document.querySelectorAll('.monthlyPrice'); //Monthly Price Area
 annualPriceOutter = document.querySelectorAll('.annualPriceOutter'); //Annual Price Outter Area
 annualPriceInner = document.querySelectorAll('.annualPriceInner'); //Annual Price Inner Area

 numberOfUsers = $('#users-spinner').val();

});

if(!numberOfUsers){

  numberOfUsers = $('#numberOfLicenses').val();
}


//This function will take the clicked button and actuate the spinner based on the provided function/operator
// - this allows you to adjust the limits of specific spinners based on classnames
function trigger_Spinner(clickedButton, plus_minus, limits) {

  var valueElement = clickedButton.closest('.customSpinner').find('.spinnerVal'); //gets the closest value element to this button
  var controllerbuttons = {
    minus: clickedButton.closest('.customSpinner').find('.spinnerMinus'),
    plus: clickedButton.closest('.customSpinner').find('.spinnerPlus')
  }; //to get the button pair associated only with this set of input controls//THank You Jesus!

  //Activate Spinner
  updateSpinner(limits, plus_minus, valueElement, controllerbuttons); //to update the Spinner

}



/*
	max - maxValue
  min - minValue
  operator - +/-
  elem - the element that will be used to update the count
*/
function updateSpinner(limits, operator, elem, buttons) {


  var currentVal = parseInt(elem.val()); //get the current val

  //Operate on value -----------------
  if (operator == "+" && currentVal >= limits.min && currentVal <= limits.max) {
    currentVal += 1; //Increment by one  
    if (currentVal <= limits.max) {
      elem.val(currentVal);
      numberOfUsers = currentVal;
    }
  } else if (operator == "-" && currentVal > limits.min) {
    currentVal -= 1; //Decrement by one
    if (currentVal >= limits.min) {
      elem.val(currentVal);
      numberOfUsers = currentVal;
    }
  }

  $.ajax({

    url: "/site/calculateQuotations/" + numberOfUsers,
    type: 'get',
    success: function(data){


      monthlyPrice.forEach((monthlyDiv) => {
        monthlyDiv.innerHTML = data.monthlyPrice;
      });

      annualPriceOutter.forEach((annualDiv) => {
        annualDiv.innerHTML = data.annualPrice;
      });

      annualPriceInner.forEach((annualDiv) => {
        annualDiv.innerHTML = data.annualPrice * 12;

      });
      
      $('#monthlySubBtn').attr('data-monthlyFees', data.monthlyPrice);
      $('#annualSubBtn').attr('data-annualFees', data.annualPrice * 12);

    }, error: function () {
        alert("error!!!!");
    }

  });

  //Independent Controllers - Handle Buttons disable toggle ------------------------
  buttons.plus.prop('disabled', (currentVal >= limits.max)); //enable/disable button
  buttons.minus.prop('disabled', (currentVal <= limits.min)); //enable/disable button  

}



var type = $('#subscriptionType').val();
var amount = $('#newLicensesAmount').val();

$('#monthlySubBtn').on('click', function(){

  amount = this.getAttribute("data-monthlyFees");

  type = 1;
  $('#monthly-plan-card').show();
  $('#annual-plan-card').hide();
});

$('#annualSubBtn').on('click', function(){

  amount = this.getAttribute("data-annualFees");

  type = 2;
  $('#monthly-plan-card').hide();
  $('#annual-plan-card').show();
});

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function visa(noOfUsers){
  $('#loading-spinner').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $.ajax({
      url: "/en/site/b2bPayVisa",
      type: 'post',
      data: {'amount': amount, 'type': type, 'numberOfUsers': noOfUsers},
      success: function (data) {
        console.log(data);
          if(data.token){
              document.getElementById("visaiframe").src =
              "https://uae.paymob.com/api/acceptance/iframes/10064?payment_token="+ data.token;
              $('#PaymentsMethods').hide();
              $('#VisaDiv').show();
              $('#KioskAmanDiv').hide();
              $('#KioskMasaryDiv').hide();
              $('#FawryDiv').hide();
              $('#mobileWalletDiv').hide();
              $('#ChangePaymentsDiv').show();

              $('#monthly-plan-card').hide();
              $('#annual-plan-card').hide();
          }     
      }, error: function () {
          alert("error!!!!");
      }
  });
};


function fawry(noOfUsers){

$('#loading-spinner').show();
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: "/en/site/b2bPayFawry",
    type: 'post',
    data: {'amount': amount, 'type': type, 'numberOfUsers': noOfUsers},
    success: function (data) {
        console.log(data);
        if(data.payment_data){
            document.getElementById("FawryDivReference").innerHTML = data.payment_data;
            $('#PaymentsMethods').hide();
            $('#VisaDiv').hide();
            $('#KioskAmanDiv').hide();
            $('#KioskMasaryDiv').hide();
            $('#vodafoneDiv').hide();
            $('#coupon').hide();
            $('#mobileWalletDiv').hide();
            $('#ChangePaymentsDiv').show();
            $('#FawryDiv').show();
            $('#loading-spinner').hide();

            $('#monthly-plan-card').hide();
            $('#annual-plan-card').hide();
        }     
    }, error: function () {
        alert("error!!!!");
    }
});
};


function KioskAman(noOfUsers){

$('#loading-spinner').show();
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: "/en/site/b2bPayKiosk/aman",
    type: 'post',
    data: {'amount': amount, 'type': type, 'numberOfUsers': noOfUsers},
    success: function (data) {
        if(data.payment_data){
            document.getElementById("KioskAmanDivReference").innerHTML = data.payment_data;
            $('#PaymentsMethods').hide();
            $('#VisaDiv').hide();
            $('#KioskAmanDiv').show();
            $('#KioskMasaryDiv').hide();
            $('#FawryDiv').hide();
            $('#vodafoneDiv').hide();
            $('#coupon').hide();
            $('#mobileWalletDiv').hide();
            $('#ChangePaymentsDiv').show();
            $('#loading-spinner').hide();

            $('#monthly-plan-card').hide();
            $('#annual-plan-card').hide();
        }     
    }, error: function () {
        alert("error!!!!");
    }
});
};

function KioskMasary(noOfUsers){

$('#loading-spinner').show();
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: "/en/site/b2bPayKiosk/masary",
    type: 'post',
    data: {'amount': amount, 'type': type, 'numberOfUsers': noOfUsers},
    success: function (data) {
        if(data.payment_data){
            document.getElementById("KioskMasaryDivReference").innerHTML = data.payment_data;
            $('#PaymentsMethods').hide();
            $('#VisaDiv').hide();
            $('#KioskAmanDiv').hide();
            $('#KioskMasaryDiv').show();
            $('#FawryDiv').hide();
            $('#vodafoneDiv').hide();
            $('#coupon').hide();
            $('#mobileWalletDiv').hide();
            $('#ChangePaymentsDiv').show();
            $('#loading-spinner').hide();

            $('#monthly-plan-card').hide();
            $('#annual-plan-card').hide();
        }     
    }, error: function () {
        alert("error!!!!");
    }
});
};

function mobileWallet(noOfUsers){

$('#loading-spinner').show();
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: "/en/site/b2bPayWallet",
    type: 'post',
    data: {'amount': amount, 'type': type, 'numberOfUsers': noOfUsers},
    success: function (data) {
        if(data){
            
            $('#PaymentsMethods').hide();
            $('#VisaDiv').hide();
            $('#FawryDiv').hide();
            $('#KioskAmanDiv').hide();
            $('#KioskMasaryDiv').hide();
            $('#vodafoneDiv').hide();
            $('#coupon').hide();
            $('#mobileWalletDiv').show();
            $('#ChangePaymentsDiv').show();
            $('#loading-spinner').hide();

            $('#monthly-plan-card').hide();
            $('#annual-plan-card').hide();
        }     
    }, error: function () {
        alert("error!!!!");
    }
});
};

function changeMethod() {
  $('#loading-spinner').hide();
  $('#PaymentsMethods').show();
  $('#FawryDiv').hide();
  $('#VisaDiv').hide();
  $('#KioskAmanDiv').hide();
  $('#KioskMasaryDiv').hide();
  $('#coupon').show();
  $('#mobileWalletDiv').hide();
  $('#ChangePaymentsDiv').hide();
  
  if(type == 1){
    $('#monthly-plan-card').show();
    $('#annual-plan-card').hide();
  }else{
    $('#monthly-plan-card').hide();
    $('#annual-plan-card').show();
  }
};

$('#mobileForm').on('submit',function(event){
event.preventDefault();
let mobile = $('#mobile').val();
if (validatePhoneNumber(mobile)){
    $('#mobile_form_error').hide();
    $('#loading-spinner-mobile').show();

    let _token = $('#_token').val();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: "/en/site/b2bPayWallet",
        type:"GET",
        
        data:{
            "_token": "{{ csrf_token() }}",
            mobile:mobile,
            amount: amount,
            type: type,
            numberOfUsers: numberOfUsers
        },
        success:function(data){
            if(data.redirect_url){
                        
                $('#PaymentsMethods').hide();
                $('#VisaDiv').hide();
                $('#FawryDiv').hide();
                $('#KioskAmanDiv').hide();
                $('#KioskMasaryDiv').hide();
                $('#vodafoneDiv').hide();
                $('#coupon').hide();
                $('#mobileWalletDiv').hide();

                window.location.href = data.redirect_url;
                
            }   
            console.log(data);
        },
    });

}else{
    $('#mobile_form_error').show();
    $('#mobile_form_error').text("{{ trans('website.please enter a valid number') }}");
}
});


function validateForm(event) {
var phone = document.getElementById('mobile').value;
if (!validatePhoneNumber(phone)) {
    document.getElementById('mobile_form_error').classList.remove('hidden');
} else {
    document.getElementById('mobile_form_error').classList.add('hidden');
    //alert("validation success")
}
event.preventDefault();
}
