$(document).ready(function()
{

    $('.switch').click(function()
    {$.ajax({
        url:'/site/changeLanguage',
        type:'POST',dataType:'json',
        beforeSend:function(){},
        success:function(result){
            location.reload(!1)}
    });location.reload(!1)})
});




$(document).on("click", ".open-notify-modal", function () {
    //  var formId = $(this).data('id');
    //       $("#hs-notify #hs_form_val").val( formId );

    // As pointed out in comments,
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});




var hiddenn=!1;
rand=4000;
setTimeout(function(){
    $(".custom-social-proof").stop().slideToggle('slow',function(){})
},rand);
$(".custom-close").click(function(){})

$("#filterhideshow2").click( function(event){

    event.preventDefault();
    if ( $(this).hasClass("isDown") ) {
        $(".mobile-filter").stop().animate({top:"320px"}, 500);
    } else {
        $(".mobile-filter").stop().animate({top:"-540px"}, 500);
    }
    $(this).toggleClass("isDown");
    return false;
});


function stopVideo() {
    $('.modal').on('hidden.bs.modal', function(e) {
        $iframe = $(this).find("video");
        $iframe.attr("src", $iframe.attr("src"));
    });
}

function addToCartAjax(course_id) {
    $.ajax({
        url: "/courses/addToCartAjax/id/" + course_id,
        type: "GET",


        success: function(data) {
            if(data.isBusinessProfileInComplete === 1) {
                window.location.href = '/account/complete';
            }
            $('.add_cart').attr("onclick", "removeFromCartAjax(" + course_id + ")");
            $('.add_cart').addClass('remove_cart');
            $('.add_cart').removeClass('add_cart');

            $('.start_learn').fadeOut(200, function() {
                $(this).text(data.goToCart).fadeIn(200);
                $(this).attr('href', '/cart');
                $(this).removeAttr('data-dismiss data-toggle data-target');
                $(this).addClass('go_cart');
                $(this).removeClass('start_learn');
            });

            $('.remove_cart').fadeOut(0, function() {
                $(this).text(data.removeFromCart).fadeIn(0);
            });


            var cartBtn = $('.remove_cart');



            if($('.mobile-header').css('display') == 'none'){
                var cartCountPosition = $('#desktop-cart-count').offset();
            }else{
                var cartCountPosition = $('#mobile-cart-count').offset();
            }

            var btnPosition = $(cartBtn).offset();

            var leftPos =
                cartCountPosition.left < btnPosition.left ?
                    btnPosition.left - (btnPosition.left - cartCountPosition.left) :
                    cartCountPosition.left;
            var topPos =
                cartCountPosition.top < btnPosition.top ?
                    cartCountPosition.top :
                    cartCountPosition.top;

            $(cartBtn).append('<span class="cart-count-animate">1</span>');

            $(cartBtn).find(".cart-count-animate").each(function(i, count) {
                $(count).offset({
                    left: leftPos,
                    top: topPos
                })
                    .animate({
                            opacity: 0,
                            function(){

                            }
                        },
                        800,
                        function() {

                            $('.cart-count').text(data.cart_count);




                        }
                    );
            });





        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });

}

function removeFromCartAjax(course_id) {
    $.ajax({
        url: "/courses/removeFromCartAjax/id/" + course_id,
        type: "GET",

        success: function(data) {

            $('.cart-count').text(data.cart_count);
            if(data.certificatesAvailable){
                $('.remove_cart').attr("onclick", "loadModal('/courses/certificatesContainer/id/'," + course_id + ")");
            }else{
                $('.remove_cart').attr("onclick", "addToCartAjax(" + course_id + ")");
            }
            $('.remove_cart').addClass('add_cart');
            $('.remove_cart').removeClass('remove_cart');

            $('.go_cart').fadeOut(200, function() {
                $(this).text(data.startLearningNow).fadeIn(200);
                $(this).addClass('start_learn');
                $(this).removeClass('go_cart');
                $(this).attr('href', 'javascript: void(0)');
                $(this).attr('data-dismiss', 'modal');
                $(this).attr('data-toggle', 'modal');
                $(this).attr('data-target', '#directBuyModal');

            });

            $('.add_cart').fadeOut(200, function() {
                $(this).text(data.addToCart).fadeIn(200);
            });

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function addCertToCart(){

    // $('#certificatescontainer').submit(function (event){
    event.preventDefault();
    $.ajax({

        url: '/addcerttocart',
        type: 'GET',
        contentType: "application/json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: {
            "Certificates": $('#certificatescontainer').serialize()
        },
        success: function(data){

            if(!data.success){
                alert('الرجاء اختيار الشهادات');
            }else{
                window.location.replace('/cart');
            }

        }

    });

    // });


}

function submitRegisterForm() {
    var form = document.getElementById("register_form");
    form.submit();
}

function submitContactForm(){
    var form = document.getElementById("contact-form-id");
    form.submit();
}

function subType(course_id, type, trans){

    $.ajax({

        url: "/setsubscriptiontype/" + course_id + "/" + type,
        type: 'get',

        success: function (data) {


            let priceDivs = document.querySelectorAll('.card-price');
            priceDivs.forEach((priceDiv) => {
                priceDiv.innerHTML = "";
                priceDiv.innerHTML = data.newPrice;
            });

            let monthlyDivs = document.querySelectorAll('.monthly-sub');
            let lifetimeDivs = document.querySelectorAll('.lifetime-sub');
            let yearlyDivs = document.querySelectorAll('.yearly-sub');

            let accessTime = document.querySelectorAll('.access_time');

            if(type == 1){

                accessTime.forEach((accessTimeDiv) => {
                    accessTimeDiv.innerHTML = '<i class="flaticon-global">' + trans + '</i>';
                }) ;


                monthlyDivs.forEach((monthlyDiv) => {
                    monthlyDiv.classList.add('active');
                    monthlyDiv.classList.add('sub-selected');


                });

                lifetimeDivs.forEach((lifetimeDiv) => {
                    lifetimeDiv.classList.remove('active');
                    lifetimeDiv.classList.remove('sub-selected');
                });

                yearlyDivs.forEach((yearlyDiv) => {
                    yearlyDiv.classList.remove('active');
                    yearlyDiv.classList.remove('sub-selected');
                });

            }else if(type == 2){

                accessTime.forEach((accessTimeDiv) => {
                    accessTimeDiv.innerHTML = '<i class="flaticon-global">' + trans + '</i>';
                }) ;

                monthlyDivs.forEach((monthlyDiv) => {
                    monthlyDiv.classList.remove('active');
                    monthlyDiv.classList.remove('sub-selected');
                });

                lifetimeDivs.forEach((lifetimeDiv) => {
                    lifetimeDiv.classList.add('active');
                    lifetimeDiv.classList.add('sub-selected');
                });

                yearlyDivs.forEach((yearlyDiv) => {
                    yearlyDiv.classList.remove('active');
                    yearlyDiv.classList.remove('sub-selected');
                });

            }else if(type == 3){

                accessTime.forEach((accessTimeDiv) => {
                    accessTimeDiv.innerHTML = '<i class="flaticon-global">' + trans + '</i>';
                }) ;


                monthlyDivs.forEach((monthlyDiv) => {
                    monthlyDiv.classList.remove('active');
                    monthlyDiv.classList.remove('sub-selected');
                });

                lifetimeDivs.forEach((lifetimeDiv) => {
                    lifetimeDiv.classList.remove('active');
                    lifetimeDiv.classList.remove('sub-selected');
                });

                yearlyDivs.forEach((yearlyDiv) => {
                    yearlyDiv.classList.add('active');
                    yearlyDiv.classList.add('sub-selected');
                });

            }


        }, error: function () {
            alert("error!!!!");
        }
    });

}


function loadModal(URL, ID = '', courseId = '')
{
    $.ajax({
        type:'GET',
        url:  URL + ID + '/' + courseId,
        dataType: "html",
        async: false,
        cache: false,
        success: function(response)
        {
            $('#modalBody').html("");
            $('#modalBody').append(response);
        }
    });

    $('#surveyModal').modal('show');
    return true;
}

function eventAddToCartAjax(event_id) {
    $.ajax({
        url: "/events/addToCartAjax/id/" + event_id,
        type: "GET",


        success: function(data) {
            $('.add_cart').attr("onclick", "removeEventFromCartAjax(" + event_id + ")");
            $('.add_cart').addClass('remove_cart');
            $('.add_cart').removeClass('add_cart');

            $('.start_learn').fadeOut(200, function() {
                $(this).text(data.goToCart).fadeIn(200);
                $(this).attr('href', '/cart');
                $(this).removeAttr('data-dismiss data-toggle data-target');
                $(this).addClass('go_cart');
                $(this).removeClass('start_learn');
            });

            $('.remove_cart').fadeOut(0, function() {
                $(this).text(data.removeFromCart).fadeIn(0);
            });


            var cartBtn = $('.remove_cart');



            if($('.mobile-header').css('display') == 'none'){
                var cartCountPosition = $('#desktop-cart-count').offset();
            }else{
                var cartCountPosition = $('#mobile-cart-count').offset();
            }

            var btnPosition = $(cartBtn).offset();

            var leftPos =
                cartCountPosition.left < btnPosition.left ?
                    btnPosition.left - (btnPosition.left - cartCountPosition.left) :
                    cartCountPosition.left;
            var topPos =
                cartCountPosition.top < btnPosition.top ?
                    cartCountPosition.top :
                    cartCountPosition.top;

            $(cartBtn).append('<span class="cart-count-animate">1</span>');

            $(cartBtn).find(".cart-count-animate").each(function(i, count) {
                $(count).offset({
                    left: leftPos,
                    top: topPos
                })
                    .animate({
                            opacity: 0,
                            function(){

                            }
                        },
                        800,
                        function() {

                            $('.cart-count').text(data.cart_count);




                        }
                    );
            });





        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });

}

function removeEventFromCartAjax(event_id) {
    $.ajax({
        url: "/events/removeFromCartAjax/id/" + event_id,
        type: "GET",

        success: function(data) {

            $('.cart-count').text(data.cart_count);
            $('.remove_cart').attr("onclick", "eventAddToCartAjax(" + event_id + ")");
            $('.remove_cart').addClass('add_cart');
            $('.remove_cart').removeClass('remove_cart');

            $('.go_cart').fadeOut(200, function() {
                $(this).text(data.startLearningNow).fadeIn(200);
                $(this).addClass('start_learn');
                $(this).removeClass('go_cart');
                $(this).attr('href', 'javascript: void(0)');
                $(this).attr('data-dismiss', 'modal');
                $(this).attr('data-toggle', 'modal');
                $(this).attr('data-target', '#directBuyModal');

            });

            $('.add_cart').fadeOut(200, function() {
                $(this).text(data.addToCart).fadeIn(200);
            });

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function serializeFormById(id){

    return $('#' + id).serialize()
}


let subscriptionType = null;
let minimumUsers = $('#numberOfUsersLimit').val();

// $('#monthlySubBtn').on('click', function(){
//     subscriptionType = 1;
//
//     $('#monthly-plan-card').show();
//     $('#annual-plan-card').hide();
//
// });
//
// $('#annualSubBtn').on('click', function(){
//     subscriptionType = 2;
//     $('#monthly-plan-card').hide();
//     $('#annual-plan-card').show();
// });


$('#monthlySubBtn').on('click', function(){
    subscriptionType = 1;
    $('#monthly-plan-card').show();
    $('#annual-plan-card').hide();

    const monthlyFees = $(this).data('monthlyFees');
    const data = {
        amount: monthlyFees,
        subscriptionType: subscriptionType,
        numberOfUsers: minimumUsers // إذا كنت تعرف هذا الرقم مسبقًا
    };

    hyperpay(JSON.stringify(data)); // تشغيل الدفع فورًا
});

$('#annualSubBtn').on('click', function(){
    subscriptionType = 2;
    $('#monthly-plan-card').hide();
    $('#annual-plan-card').show();

    const annualFees = $(this).data('annualFees');
    const data = {
        amount: annualFees,
        subscriptionType: subscriptionType,
        numberOfUsers: minimumUsers
    };
    $('#loading-spinner').show();
    hyperpay(JSON.stringify(data));
});







function visa(data){
    data = JSON.parse(data);
    data['Certificates'] = serializeFormById('direct-pay-cert-container');
    data['subType'] = subscriptionType;
    data['numberOfUsers'] = minimumUsers;

    $('#loading-spinner').show();
    $.ajax({
        url: "/pay/visa",
        type: 'get',
        data: data,
        success: function (data) {
            if(data.token){
                document.getElementById("visaiframe").src =
                    "https://uae.paymob.com/api/acceptance/iframes/10064?payment_token="+ data.token;
                $('#PaymentsMethods').hide();
                $('#loading-spinner').hide();
                $('#VisaDiv').show();
                $('#KioskAmanDiv').hide();
                $('#KioskMasaryDiv').hide();
                $('#FawryDiv').hide();
                $('#mobileWalletDiv').hide();
                $('#ChangePaymentsDiv').show();
            }
        }, error: function () {
            alert("error!!!!");
        }
    });
}
// function hyperpay(data){
//     data = JSON.parse(data);
//     // data['Certificates'] = serializeFormById('direct-pay-cert-container');
//     data['subType'] = subscriptionType;
//     data['numberOfUsers'] = minimumUsers;
//
//     $('#loading-spinner').show();
//     $.ajax({
//         url: "/pay/hyperpay",
//         type: 'get',
//         data: data,
//         success: function (data) {
//             if(data.html){
//                 //  AJAX
//                 const script = document.createElement('script');
//                 script.src = "https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId="+data.payment_id;
//                 document.head.appendChild(script);
//
//                 script.onload = function () {
//                     // إخفاء الـ spinner
//                     $('#loading-spinner').hide();
//
//                     // إظهار فورم الدفع إذا كنت تخفيه سابقًا
//                     // $('#hyperpayDiv').show();
//                 };
//
//                 const subTotalAmount = parseFloat(data.amount);
//                 const shippingAmount = 0;
//                 const taxAmount = 0;
//                 const currency = "SAR";
//                 const applePayTotalLabel = "";
//
//                 function getAmount() {
//                     return ((subTotalAmount + shippingAmount + taxAmount)).toFixed(2);
//                 }
//
//                 function getLineItems() {
//                     return [{
//                         label: 'Subtotal',
//                         amount: (subTotalAmount).toFixed(2)
//                     }, {
//                         label: 'Shipping',
//                         amount: (shippingAmount).toFixed(2)
//                     }, {
//                         label: 'Tax',
//                         amount: (taxAmount).toFixed(2)
//                     }];
//                 }
//
//                 const wpwlOptions = {
//                     locale: "ar",
//                     applePay: {
//                         displayName: "",
//                         total: {
//                             label: ""
//                         },
//                         paymentTarget: '_top',
//                         merchantCapabilities: ['supports3DS'],
//                         supportedNetworks: ['mada', 'masterCard', 'visa'],
//                         supportedCountries: ['SA'],
//                     }
//                 };
//
//                 wpwlOptions.createCheckout = function() {
//                     return $.post("training.futurework.com.sa/ar/payments/verify/hyperpay")
//                         .then(function(response) {
//                             return response.checkoutId;
//                         });
//                 };
//
//                 $('#PaymentsMethods').hide();
//
//                 if(data == "VISA"){
//                     $('#hyperpayDiv').hide();
//                     $('#VisaDiv').show();
//                 }else{
//                     $('#hyperpayDiv').show();
//                     $('#VisaDiv').hide();
//                 }
//
//                 $('#ChangePaymentsDiv').show();
//             }
//         }, error: function () {
//             alert("error!!!!");
//         }
//     });
//
//
// }
//



function hyperpay(dataString) {
    const data = JSON.parse(dataString); // Decode incoming data safely

    // Ensure everything needed is present in the data object
    const subscriptionType = data.subscriptionType || null;
    const numberOfUsers = data.numberOfUsers || null;

    // Optionally add subType if it's needed for backend
    data.subType = subscriptionType;
    data.numberOfUsers = numberOfUsers;

    $('#loading-spinner').show();

    $.ajax({
        url: "/pay/hyperpay",
        type: 'get',
        data: data,
        success: function (response) {
            if (response.html) {
                const script = document.createElement('script');
                script.src = "https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=" + response.payment_id;

                script.onload = function () {
                    $('#loading-spinner').hide();
                    $('#hyperpayDiv').show(); // Optional: Show form after load
                };

                document.head.appendChild(script);

                // HyperPay widget options
                const wpwlOptions = {
                    locale: "ar",
                    applePay: {
                        displayName: "",
                        total: { label: "" },
                        paymentTarget: '_top',
                        merchantCapabilities: ['supports3DS'],
                        supportedNetworks: ['mada', 'masterCard', 'visa'],
                        supportedCountries: ['SA'],
                    },
                    createCheckout: function () {
                        return $.post("/ar/payments/verify/hyperpay")
                            .then(function (res) {
                                return res.checkoutId;
                            });
                    }
                };

                $('#PaymentsMethods').hide();

                if (response.brand === "VISA") {
                    $('#hyperpayDiv').hide();
                    $('#VisaDiv').show();
                } else {
                    $('#hyperpayDiv').show();
                    $('#VisaDiv').hide();
                }

                $('#ChangePaymentsDiv').show();
            }
        },
        error: function () {
            $('#loading-spinner').hide();
            alert("حدث خطأ أثناء تحميل بوابة الدفع، حاول مرة أخرى.");
        }
    });
}


function fawry(data){

    data = JSON.parse(data);
    data['Certificates'] = serializeFormById('direct-pay-cert-container');
    data['subType'] = subscriptionType;
    data['numberOfUsers'] = minimumUsers;

    $('#loading-spinner').show();
    $.ajax({
        url: "/pay/fawry",
        type: 'get',
        data: data,
        success: function (data) {
            if(data.token){
                document.getElementById("FawryDivReference").innerHTML = data.token;
                $('#PaymentsMethods').hide();
                $('#VisaDiv').hide();
                $('#KioskAmanDiv').hide();
                $('#KioskMasaryDiv').hide();
                $('#vodafoneDiv').hide();
                $('#coupon').hide();
                $('#mobileWalletDiv').hide();
                $('#ChangePaymentsDiv').show();
                $('#FawryDiv').show();
            }else{
                alert('failed');
            }
            $('#loading-spinner').hide();
        }, error: function () {
            alert("error!!!!");
        }
    });
}


function KioskAman(data){

    data = JSON.parse(data);
    data['Certificates'] = serializeFormById('direct-pay-cert-container');
    data['subType'] = subscriptionType;
    data['numberOfUsers'] = minimumUsers;

    $('#loading-spinner').show();
    $.ajax({
        url: "/pay/kioskaman",
        type: 'get',
        data: data,
        success: function (data) {
            if(data.token){
                document.getElementById("KioskAmanDivReference").innerHTML = data.token;
                $('#PaymentsMethods').hide();
                $('#VisaDiv').hide();
                $('#FawryDiv').hide();
                $('#KioskAmanDiv').show();
                $('#KioskMasaryDiv').hide();
                $('#vodafoneDiv').hide();
                $('#coupon').hide();
                $('#mobileWalletDiv').hide();
                $('#ChangePaymentsDiv').show();
                $('#loading-spinner').hide();

            }
        }, error: function () {
            alert("error!!!!");
        }
    });
}

function KioskMasary(data){

    data = JSON.parse(data);
    data['Certificates'] = serializeFormById('direct-pay-cert-container');
    data['subType'] = subscriptionType;
    data['numberOfUsers'] = minimumUsers;

    $('#loading-spinner').show();
    $.ajax({
        url: "/pay/kioskmasary",
        type: 'get',
        data: data,
        success: function (data) {
            if(data.token){
                document.getElementById("KioskMasaryDivReference").innerHTML = data.token;
                $('#PaymentsMethods').hide();
                $('#VisaDiv').hide();
                $('#FawryDiv').hide();
                $('#KioskAmanDiv').hide();
                $('#KioskMasaryDiv').show();
                $('#vodafoneDiv').hide();
                $('#coupon').hide();
                $('#mobileWalletDiv').hide();
                $('#ChangePaymentsDiv').show();
                $('#loading-spinner').hide();

            }
        }, error: function () {
            alert("error!!!!");
        }
    });
}

function mobileWallet(data){

    data = JSON.parse(data);
    data['Certificates'] = serializeFormById('direct-pay-cert-container');
    data['mobile'] = serializeFormById('mobileForm').split("mobile=")[1];
    data['subType'] = subscriptionType;
    data['numberOfUsers'] = minimumUsers;

    if(data['mobile'] && !validateForm(data['mobile'])){
        return false;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#loading-spinner').show();
    $.ajax({
        url: "/pay/wallet",
        type: 'post',
        data: data,
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

                if(data.redirect_url){
                    window.location.href = data.redirect_url;
                }
            }
        }, error: function () {
            alert("error!!!!");
        }
    });
};

function changeMethod() {
    $('#loading-spinner').hide();
    $('#PaymentsMethods').show();
    $('#VisaDiv').hide();
    $('#hyperpayDiv').hide();
    $('#FawryDiv').hide();
    $('#KioskAmanDiv').hide();
    $('#KioskMasaryDiv').hide();
    $('#vodafoneDiv').hide();
    $('#coupon').show();
    $('#mobileWalletDiv').hide();
    // $('#ChangePaymentsDiv').hide();
};

// $('#mobileForm').on('submit',function(event){
//     event.preventDefault();
//     let mobile = $('#mobile').val();
//     if (validatePhoneNumber(mobile)){
//         $('#mobile_form_error').hide();
//         $('#loading-spinner-mobile').show();
//     }else{
//         $('#mobile_form_error').show();
//         $('#mobile_form_error').text("Please enter a valid number");
//     }

//     let course_id = {{$course->id}};
//     let _token = $('#_token').val();
//     // let _token = $('meta[name="csrf-token"]').attr('content');
//     $.ajax({
//     url: "/pay/wallet",
//     type:"GET",

//     data:{
//         "_token": _token,
//         mobile:mobile,
//         course_id:course_id,
//     },

//     success:function(data){
//         if(data.redirect_url){
//             $('#PaymentsMethods').hide();
//             $('#VisaDiv').hide();
//             $('#FawryDiv').hide();
//             $('#KioskAmanDiv').hide();
//             $('#KioskMasaryDiv').hide();
//             $('#vodafoneDiv').hide();
//             $('#coupon').hide();
//             $('#mobileWalletDiv').hide();
//             window.location.href = data.redirect_url;
//         }   
//     },
// });

function validateForm(phone) {
    if (!validatePhoneNumber(phone)) {
        $('#mobile_form_error').show();
        return false;
    } else {
        $('#mobile_form_error').hide();
        return true;
        //alert("validation success")
    }
    // event.preventDefault();
}

function validatePhoneNumber(input_str) {
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    if(input_str.length > 11){
        return false;
    }else{
        return re.test(input_str);
    }
}
  