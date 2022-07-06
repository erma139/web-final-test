<!DOCTYPE html>
<html>
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

            span.psw {
                float: right;
                padding-top: 16px;
            }
        </style>
    </head>

    <body>
        @if (session('success'))
        <script>
            alert('Your account has been created successfully.');
        </script>
        @endif

        @if (session('fail'))
        <script>
            alert('Something went wrong, try again!');
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

        <form name="registerForm" action="{{ route('register.post') }}" method="POST">
            {{ csrf_field() }}
            <div class="container">
                <h1>Create a new account</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <div class="w3-row">
                    <div class="w3-half" style="padding-right:4px">
                        <p>
                            <label for="name"><b>Full Name</b></label>
                            <input type="text" name="name" style="text-transform: capitalize" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span style="color:red">{{ $errors->first('name') }}</span>
                            @endif
                        </p>

                        <p>
                            <label for="email"><b>Email</b></label>
                            <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; outline: none;">
                            @if ($errors->has('email'))
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            @endif
                        </p>

                        <p>
                            <label for="phone"><b>Phone Number</b></label>
                            <input type="number" name="phone" maxlength="12" value="{{ old('phone') }}" style="width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; outline: none;">
                            @if ($errors->has('phone'))
                                <span style="color:red">{{ $errors->first('phone') }}</span>
                            @endif
                        </p>
                    </div>

                    <div class="w3-half" style="padding-right:4px">
                        <p>
                            <label for="address"><b>Mailing Address</b></label>
                            <textarea rows="4" name="address" value="{{ old('address') }}" style="width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; outline: none; text-transform: capitalize;"></textarea>
                            @if ($errors->has('address'))
                                <span style="color:red">{{ $errors->first('address') }}</span>
                            @endif
                        </p>

                        <div class="w3-row">
                            <div class="w3-half" style="padding-right:4px">
                                <p>
                                    <label for="state"><b>State</b></label>
                                    <select class="w3-select w3-border w3-round" name="state" value="{{ old('state') }}" style="width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; outline: none;">
                                        <option selected="true" disabled>--Select State--</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                                        <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                                        <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
                                    </select>
                                    @if ($errors->has('state'))
                                        <span style="color:red">{{ $errors->first('state') }}</span>
                                    @endif
                                </p>
                            </div>

                            <div class="w3-half" style="padding-right:4px">
                                <p>
                                    <label for="psw"><b>Password</b></label>
                                    <input type="password" name="password">
                                    @if ($errors->has('password'))
                                        <span style="color:red">{{ $errors->first('password') }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" name="registerbtn" class="registerbtn">Create Account</button>
            </div>
            
            <div class="container signin" style="background-color: #f1f1f1">
                <p>Already have an account? <a href="{{ url('login') }}">Login here</a></p>
            </div>
        </form>

        <p class="w3-center w3-text-black">Copyright&copy; MyTutor-Erma 281299<p>
    </body>
</html>