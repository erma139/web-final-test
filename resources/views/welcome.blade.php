<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>MyTutor</title>
        <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Raleway", sans-serif
        }

        body, html {
            height: 100%;
            line-height: 1.8;
        }

        .bg-1 {
            background-position: center;
            background-size: cover;
            background-color: teal;
            min-height: 100%;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }
        </style>
    </head>

    <body>
        <div class="w3-top">
            <div class="w3-bar w3-white w3-card" id="myNavbar">
                <a href="{{ url('/') }}" class="w3-bar-item w3-button"><i class="fa fa-institution"></i> MYTUTOR</a>
                <div class="w3-right">
                    <a href="{{ url('login') }}" class="w3-bar-item w3-button">LOGIN</a>
                    <a href="{{ url('register') }}" class="w3-bar-item w3-button">REGISTER</a>
                </div>
            </div>
        </div>

        <header class="bg-1 w3-display-container w3-grayscale-min">
            <div class="w3-display-left w3-text-white" style="padding:48px">
                <span class="w3-jumbo w3-hide-small">Grow Your Tutoring Career Here</span><br>
                <span class="w3-large">Part-time or full-time, online or in-person - whatever may be your prefence, MyTutor provides you with the perfect platform to launch, grow and promote your career as a tutor.</span>
                <p><a href="{{ url('register') }}" class="w3-button w3-white w3-padding-large w3-large w3-margin-top">Register today</a></p>
            </div>
        </header>

        <p class="w3-center w3-text-black">Copyright&copy; MyTutor-Erma 281299<p>
    </body>
</html>
