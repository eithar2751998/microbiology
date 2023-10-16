
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.seekviral.com/trimba3/forms/ProgrammingPoll/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 19:18:58 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Page</title>

    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="{{asset('assets/front/question/css/bootstrap.min.css')}}">

    <!-- custom-styles -->
    <link rel="stylesheet" href="{{asset('assets/front/question/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/question/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/question/css/animation.css')}}">


    <!-- color sceme -->
    <link rel="stylesheet" href="{{asset('assets/front/question/css/colorvariants/default.css')}}" id="defaultscheme">



    <!-- color switcher -->
    <link rel="stylesheet" href="{{asset('assets/colorswitcher/front/question/css/colorswitcher.css')}}">
</head>
<body>

<main class="overflow-hidden">
    <div class="container">
        <div class="wrapper popreveal">
            <div class="main-heading">
                What Programming Language do You use  During the Coding interview?
            </div>
            <div class="pole-form">

                <!-- form -->
                <form class="show-section" id="steps" method="post">


                    <!-- step 1 -->
                    <fieldset id="step1" class="fields">
                        <div class="radiofield">
                            <input type="radio" name="opt1" value="Python">
                            <label>Python</label>
                        </div>
                        <div class="radiofield delay-100ms">
                            <input type="radio" name="opt1" value="Javascript">
                            <label>Javascript</label>
                        </div>
                        <div class="radiofield delay-200ms">
                            <input type="radio" name="opt1" value="Go">
                            <label>Go</label>
                        </div>
                        <div class="radiofield delay-300ms">
                            <input type="radio" name="opt1" value="PHP">
                            <label>PHP</label>
                        </div>

                        <!-- next btn -->
                        <div class="next_prev">
                            <button type="button" class="next" id="sub">
                                <span>Vote Now</span>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <!-- footer  -->
            <footer>
                <div class="vote_count">
                    <div class="users">
                        <img class="no-left" src="assets/images/users/u1.png" alt="">
                        <img src="assets/images/users/u2.png" alt="">
                        <img src="assets/images/users/u1.png" alt="">
                    </div>
                    <div class="total-votes">
                        Total Votes: <span>24</span>
                    </div>
                    <div class="dot">
                    </div>
                    <div id="countdown">

                    </div>
                </div>
            </footer>
        </div>
    </div>
</main>

<!-- thankyou section -->
<main class="thankyoupage overflow-hidden">
    <div class="container">
        <div class="wrapper popreveal">
            <div class="main-heading">
                What Programming Language do You use  During the Coding interview?
            </div>
            <div class="pole-form">
                <div class="thankyou">
                    <div class="result opt1">
                        <div class="prnct">15%</div>
                        <div class="bar">
                            <label>Python</label>
                            <div class="prnct-bar"></div>
                        </div>
                    </div>
                    <div class="result opt2">
                        <div class="prnct">15%</div>
                        <div class="bar">
                            <label>Javascript</label>
                            <div class="prnct-bar"></div>
                        </div>
                    </div>
                    <div class="result opt3">
                        <div class="prnct">10%</div>
                        <div class="bar">
                            <label>Go</label>
                            <div class="prnct-bar"></div>
                        </div>
                    </div>
                    <div class="result opt4">
                        <div class="prnct">60%</div>
                        <div class="bar">
                            <label>PHP</label>
                            <div class="prnct-bar"></div>
                        </div>
                    </div>
                </div>
                <div class="next_prev">
                    <button id="goback" type="button" class="next">
                        <span>Undo?</span>
                    </button>
                </div>
            </div>
            <footer>
                <div class="vote_count">
                    <div class="users">
                        <img class="no-left" src="assets/images/users/u1.png" alt="">
                        <img src="assets/images/users/u2.png" alt="">
                        <img src="assets/images/users/u1.png" alt="">
                    </div>
{{--                    <div class="total-votes">--}}
{{--                        Total Votes: <span>24</span>--}}
{{--                    </div>--}}
                </div>
            </footer>
        </div>
    </div>
</main>






<div id="error">

</div>


<!-- Bootstrap-5 -->
<script src="{{asset('assets/front/question/js/bootstrap.min.js')}}"></script>

<!-- Jquery -->
<script src="{{asset('assets/front/question/js/jquery-3.6.1.min.js')}}"></script>

<!-- My js -->
<script src="{{asset('assets/front/question/js/custom.js')}}"></script>

<!-- colorswitcher -->
<script src="{{asset('assets/front/question/js/callswitcher.js')}}"></script>
</body>

<!-- Mirrored from templates.seekviral.com/trimba3/forms/ProgrammingPoll/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 19:19:02 GMT -->
</html>
