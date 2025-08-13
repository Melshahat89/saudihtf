{{--@extends(layoutExtend('website'))--}}
{{--@section('title')--}}
{{--    {{ trans('website.Contact Us') }}--}}
{{--@endsection--}}
{{--@section('description')--}}
{{--    {{ trans('home.HomeDescription') }}--}}
{{--@endsection--}}
{{--@section('keywords')--}}
{{--    {{ trans('home.HomeKeywords') }}--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => trans('website.Spin and Win')])--}}



    {{--    <link rel="stylesheet" href="{{ url('website/') }}/css/main.css" type="text/css" />--}}
    <script type="text/javascript" src="{{ url('website/js') }}/Winwheel.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    @push('css')
        <style>
            body
            {
                font-family: arial;
            }

            /* Sets the background image for the wheel */
            td.the_wheel
            {
                background-image: url(https://raw.githubusercontent.com/zarocknz/javascript-winwheel/master/examples/wheel_of_fortune/wheel_back.png);
                background-position: center;
                background-repeat: none;
            }

            /* Do some css reset on selected elements */
            h1, p
            {
                margin: 0;
            }

            div.power_controls
            {
                margin-right:70px;
            }

            div.html5_logo
            {
                margin-left:70px;
            }

            /* Styles for the power selection controls */
            table.power
            {
                background-color: #cccccc;
                cursor: pointer;
                border:1px solid #333333;
            }

            table.power th
            {
                background-color: white;
                cursor: default;
            }

            td.pw1
            {
                background-color: #6fe8f0;
            }

            td.pw2
            {
                background-color: #86ef6f;
            }

            td.pw3
            {
                background-color: #ef6f6f;
            }

            /* Style applied to the spin button once a power has been selected */
            .clickable
            {
                cursor: pointer;
            }

            /* Other misc styles */
            .margin_bottom
            {
                margin-bottom: 5px;
            }
        </style>
    @endpush

    <section class="contact-content">
        <div class="container">
            <div align="center">
                <h1>{{trans('website.Spin and Win')}} </h1>
                <p>
                    {{ trans('website.And try your luck from the New Year')}}
                </p>

                <div class="alert alert-success" style="display:none"></div>

                 <span   style="display:none" id="role"></span>


            <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
{{--                        <td>--}}
{{--                            <div class="power_controls">--}}

{{--                                                                &nbsp;&nbsp;<a href="#" onClick="resetWheel(); return false;">حاول مجددا</a><br />--}}
{{--                            </div>--}}

{{--                        </td>--}}
                        <td width="320" height="425.21" style="background-image: url({{ url('website/') }}/wheel_back2.png) ;
                            background-repeat: no-repeat;
                            background-size: 100% 100%;

                        " class="the_wheel" align="center" valign="center">
                            <canvas id="canvas" width="300" height="300" style="padding-top: 10px;">
                                <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                            </canvas>
                        </td>

                    </tr>
                </table>
                <img id="spin_button" src="{{ url('website/') }}/spin_on.png" alt="Spin" onClick="startSpin();" />

            </div>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>




        <script>


                jQuery(function($){
                    var roles = ['<a href="{{url("cart")}}"><span style="color: red">{{trans('website.New Year discounts')}}</span>  {{trans('website.try now')}}  </a>',
                        '<a href="{{url("cart")}}"><span style="color: #214291">{{trans('website.Your luck this year')}} </span>{{trans('website.try now')}} </a>'];
                    //used to determine which is the next roles to be displayed
                    var counter = 0;
                    var $role = $('#role')
                    //repeat the passed function at the specified interval - it is in milliseconds
                    setInterval(function(){
                        //display the role and increment the counter to point to next role
                        $role.html(roles[counter++]);
                        //if it is the last role in the array point back to the first item
                        if(counter >= roles.length){
                            counter = 0;
                        }
                    }, 1000)
                })


                // Create new wheel object specifying the parameters at creation time.
                let theWheel = new Winwheel({
                    'numSegments'  : 5,     // Specify number of segments.
                    'outerRadius'  : 145,   // Set outer radius so wheel fits inside the background.
                    'textFontSize' : 15,    // Set font size as desired.
                    'segments'     :        // Define segments including colour and text.
                        [
                            {'fillStyle' : '#214291' , 'textFillStyle' : 'white', 'id' : 1 , 'text' : '{!! trans('website.gift1') !!} '},
                            {'fillStyle' : '#fbca15', 'id' : 2 ,'text' : '{!! trans('website.gift2') !!}'},
                            {'fillStyle' : '#17af88', 'textFillStyle' : 'white', 'id' : 3 ,'text' : '{!! trans('website.gift3') !!}'},
                            {'fillStyle' : '#fb2040', 'textFillStyle' : 'white', 'id' : 4 ,'text' : '{!! trans('website.gift4') !!}'},
                            {'fillStyle' : '#ddece7', 'id' : 5 ,'text' : '{!! trans('website.gift5') !!}'},
                        ],
                    'animation' :           // Specify the animation to use.
                        {
                            'type'     : 'spinToStop',
                            'duration' : 10,     // Duration in seconds.
                            'spins'    : 5,     // Number of complete spins.
                            'callbackFinished' : alertPrize
                        }
                });

                // Vars used by the code in this page to do power controls.
                let wheelPower    = 0;
                let wheelSpinning = false;

                // -------------------------------------------------------
                // Function to handle the onClick on the power buttons.
                // -------------------------------------------------------
                function powerSelected(powerLevel)
                {
                    // Ensure that power can't be changed while wheel is spinning.
                    if (wheelSpinning == false) {
                        // Reset all to grey incase this is not the first time the user has selected the power.
                        // document.getElementById('pw1').className = "";
                        // document.getElementById('pw2').className = "";
                        // document.getElementById('pw3').className = "";

                        // Now light up all cells below-and-including the one selected by changing the class.
                        if (powerLevel >= 1) {
                            document.getElementById('pw1').className = "pw1";
                        }

                        if (powerLevel >= 2) {
                            document.getElementById('pw2').className = "pw2";
                        }

                        if (powerLevel >= 3) {
                            document.getElementById('pw3').className = "pw3";
                        }

                        // Set wheelPower var used when spin button is clicked.
                        wheelPower = powerLevel;

                        // Light up the spin button by changing it's source image and adding a clickable class to it.
                        document.getElementById('spin_button').src = "{{ url('website/') }}/spin_on.png";
                        document.getElementById('spin_button').className = "clickable";
                    }
                }

                // -------------------------------------------------------
                // Click handler for spin button.
                // -------------------------------------------------------
                function startSpin()
                {
                    // Ensure that spinning can't be clicked again while already running.
                    if (wheelSpinning == false) {
                        // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                        // to rotate with the duration of the animation the quicker the wheel spins.
                        if (wheelPower == 1) {
                            theWheel.animation.spins = 3;
                        } else if (wheelPower == 2) {
                            theWheel.animation.spins = 8;
                        } else if (wheelPower == 3) {
                            theWheel.animation.spins = 15;
                        }

                        // Disable the spin button so can't click again while wheel is spinning.
                        document.getElementById('spin_button').src       = "{{ url('website/') }}/spin_off.png";
                        document.getElementById('spin_button').className = "";

                        // Begin the spin animation by calling startAnimation on the wheel object.
                        theWheel.startAnimation();

                        // Set to true so that power can't be changed and spin button re-enabled during
                        // the current animation. The user will have to reset before spinning again.
                        wheelSpinning = true;
                    }
                }

                // -------------------------------------------------------
                // Function for reset button.
                // -------------------------------------------------------
                function resetWheel()
                {
                    theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                    theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                    theWheel.draw();                // Call draw to render changes to the wheel.

                    // document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                    // document.getElementById('pw2').className = "";
                    // document.getElementById('pw3').className = "";

                    wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
                }

                // -------------------------------------------------------
                // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
                // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
                // -------------------------------------------------------
                function alertPrize(indicatedSegment)
                {

                    // alert(indicatedSegment.id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/spin",
                        method: "POST",
                        dataType: "json",
                        data: {
                            id: indicatedSegment.id,
                        },
                        dataType: 'json',
                        success: function(result){
                            $('.alert').show();
                            $('#role').show();
                            $('.alert').html(result.success);
                        },
                        processResults: function(response){
                            return {
                                results:response
                            };
                        }

                    });

                    // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                    {{--alert("{{trans('website.You have won')}}" + indicatedSegment.text);--}}
                }
            </script>
        </div>
    </section>


{{--@endsection--}}
