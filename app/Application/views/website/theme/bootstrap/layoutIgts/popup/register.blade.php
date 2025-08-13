@php
use App\Application\Model\Categories;

$userObject = Session::get('socialUserRegister');

@endphp
<button type="button" class="close_modal" data-dismiss="modal" aria-label="Close"></button>

<div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body">

            <ul class="modal_nav_tabs">
                <li><a style="color:black;" href="/login" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal">{{trans('home.signin')}}</a></li>
                <li class="active"><span style="color:black;">{{trans('home.signup')}}</span></li>
            </ul>


            <div class="ptmd pbxs plmd prmd bg_white rounded_6">
                <div class="text_center ptmd pbmd bb">
                    <h5>{{trans('home.signin with')}}</h5>
                    <div class="socials">
                        <div class="socials">
                            <a href="{{url('social/redirect/facebook')}}" class="social_link social_facebook"><i class="fab fa-facebook-f"></i></a>
                            <div>
                                <a href="{{url('social/redirect/twitter')}}" class="social_link social_twitter"><i class="fab fa-twitter"></i></a>
                            </div>
                            <a href="{{url('social/redirect/google')}}" class="social_link social_google"><i class="fab fa-google-plus-g"></i></a>
                            <!--                            <a href="/site/oauth/provider/LinkedIn" class="social_link social_linkedin"><i class="fab fa-linkedin-in"></i></a>-->
                        </div>
                    </div>
                </div>


                @include('website.theme.bootstrap.layout.blocks.register-form')


{{--                <a onclick="return gtag_report_whatsapp_conversion('https://contactus.igtsservice.com/');" href="https://contactus.igtsservice.com/" class="social_link contact_whatsapp" style="background-color: #4AC959;">--}}
{{--                    <div class="text_center ptmd pbmd bb contact_whatsapp">--}}
{{--                        <h6 class="contact_whatsapp">{{trans('home.contact us on whatsapp')}}</h6>--}}
{{--                        <div class="socials contact_whatsapp" style="display: flex;">--}}
{{--                            <i style="font-size: 25px;" class="fab fa-whatsapp contact_whatsapp"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}


            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
    $(function() {
        $('#country-register').selectize();
        $('#country-register').on('change', function() {
            if (this.value) {
                getCountryDataAjax(function(country) {
                    $('#mobile-container').show();
                    $('#mobile-code').text(country.country_phone_code + "+");
                }, this.value);
            }
        });

        function getCountryDataAjax(handleData, countryId) {
            $.ajax({
                url: "/site/country/" + countryId,
                type: 'get',
                success: function(data) {
                    handleData(data.country);
                },
                error: function() {
                    alert("error!!!!");
                }
            });
        }
    });
</script>