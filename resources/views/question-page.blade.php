
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.seekviral.com/trimba3/forms/ProgrammingPoll/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 19:18:58 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font-awesome -->
    {{--    <link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">--}}

    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="{{asset('assets/front/question/css/bootstrap.min.css')}}">

    <!-- custom-styles -->
    <link rel="stylesheet" href="{{asset('assets/front/question/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/question/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/question/css/animation.css')}}">

    @livewireStyles

</head>
<body>

@livewire('question-page')

@livewireScripts
@stack('js')
<!-- Bootstrap-5 -->
<script src="{{asset('assets/front/question/js/bootstrap.min.js')}}"></script>

<!-- Jquery -->
<script src="{{asset('assets/front/question/js/jquery-3.6.1.min.js')}}"></script>
<!-- colorswitcher -->
{{--<script src="{{asset('assets/front/question/js/callswitcher.js')}}"></script>--}}
<script>
    window.livewire.debug = true;
</script>
</body>

<!-- Mirrored from templates.seekviral.com/trimba3/forms/ProgrammingPoll/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 19:19:02 GMT -->
</html>
