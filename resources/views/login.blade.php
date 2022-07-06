<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://www.w3schools.com/lib/w3.js"></script>
        <title>MyTutor</title>
        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: "Raleway", sans-serif
            }

            body, html {
                height: 100%;
                line-height: 1.8;
            }

            .w3-bar .w3-button {
                padding: 16px;
            }

            * {
                box-sizing: border-box;
            }
    
            .container {
                padding: 16px;
                background-color: white;
            }

            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus, input[type=password]:focus {
                /* background-color: #ddd; */
                outline: none;
            }

            /* Overwrite default styles of hr */
            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* Set a style for the submit button */
            .registerbtn {
                background-color: teal;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .registerbtn:hover {
                opacity: 1;
            }

            /* Add a blue text color to links */
            a {
                color: dodgerblue;
            }

            button {
                background-color: teal;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            
            button:hover {
                opacity: 0.8;
            }
            
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: red;
            }
        </style>
    </head>

    <body class="antialiased">
        @if (session('success'))
        <script>
            alert("Login successfully.");
        </script>
        @endif

        @if (session('fail'))
        <script>
            alert("Failed to login!");
        </script>
        @endif

        <div class="w3-top">
            <div class="w3-bar w3-white w3-card" id="myNavbar">
                <a href="{{ url('/') }}" class="w3-bar-item w3-button"><i class="fa fa-institution"></i> MYTUTOR</a>
                <div class="w3-right">
                    <a href="{{ url('login') }}" class="w3-bar-item w3-button">LOGIN</a>
                    <a href="{{ url('register') }}" class="w3-bar-item w3-button">REGISTER</a>
                </div>
            </div>
        </div>
        <br><br>

        <form name="loginForm" action="{{ route('login.post') }}" method="POST" accept-charset="UTF-8">
            {{ csrf_field() }}
            <div class="container">
                <h1>Login Form</h1>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; outline: none;">
                @if ($errors->has('email'))
                    <span style="color:red">{{ $errors->first('email') }}</span>
                @endif
                    
                <p>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password">
                    @if ($errors->has('password'))
                        <span style="color:red">{{ $errors->first('password') }}</span>
                    @endif
                </p>

                <p>
                    <label><input type="checkbox" name="rememberme" id="idremember" onclick=""> Remember me</label>
                    <br><br>
                    <button>Login</button>
                </p>
            </div>

            <div class="container" style="background-color: #f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>

        <p class="w3-center w3-text-black">Copyright&copy; MyTutor-Erma 281299<p>
    </body>
</html>