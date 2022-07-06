<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        </style>
    </head>

    <body>
        @if (session('success'))
        <script>
            alert("Data saved successfully.");
        </script>
        @endif

        @if (session('fail'))
        <script>
            alert("Data failed to save!");
        </script>
        @endif
    
        <div class="w3-top">
            <div class="w3-bar w3-white w3-card" id="myNavbar">
                <a href="{{ url('dashboard') }}" class="w3-bar-item w3-button"><i class="fa fa-institution"></i> MYTUTOR</a>
                <div class="w3-right">
                    <a href="{{ url('logout') }}" class="w3-bar-item w3-button">LOGOUT</a>
                </div>
            </div>
        </div>
        <br><br>

        <div class="container">
            <div class="w3-padding w3-margin w3-round">
                <h2><b>List of Subjects</b></h2>
                <div>
                    <button class="w3-button w3-round w3-right w3-teal w3-margin" onclick="document.getElementById('newSubject').style.display= 'block';return false;">New Item</button>
                </div>

                <div style="padding-right:4px">
                    <table class="w3-table w3-striped w3-bordered">
                        <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Total Learning Hours</th>
                            <th>Actions</th>
                        </thead>

                        @foreach ($listSubjects as $listSubject)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($listSubject->title) }}</td>
                            <td>{{ ucfirst($listSubject->description) }}</td>
                            <td>{{ $listSubject->price }}</td>
                            <td>{{ $listSubject->learning_hours }}</td>
                            <td>
                                <div class="w3-cell">
                                    <form action="{{ route('markDelete',$listSubject->id) }}" method="POST" accept-charset="UTF-8" onsubmit="return confirm('Are you sure to delete this data?');">
                                        {{ csrf_field() }}
                                        <button class="w3-button w3-round w3-block" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>

                                <div class="w3-cell">
                                    <button class="w3-button w3-round w3-block" onclick="document.getElementById('{{ $loop->iteration }}').style.display='block'; return false;"><i class="fa fa-pencil-square-o"> </i></button>
                                </div>

                                <div id="{{ $loop->iteration }}" class="w3-modal w3-animate-opacity">
                                    <div class="w3-modal-content w3-round" style="width:500px">
                                        <header class="w3-row w3-teal"><span onclick="document.getElementById('{{ $loop->iteration }}').style.display='none'" class="w3-button w3-display-topright w3-large">&times;</span>
                                            <h4 class="w3-margin-left">Update Subject Form</h4>
                                        </header>

                                        <div class="w3-padding">
                                            <form action="{{ route('markUpdate',$listSubject->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <p><input class="w3-input w3-round w3-border" type="text" name="title" placeholder="Name" style="text-transform: capitalize" value ="{{ $listSubject->title }}"></p>
                                                <p><textarea class="w3-input w3-round w3-border" rows="4" name="description" placeholder="Description" style="text-transform: capitalize" value ="">{{ $listSubject->description }}</textarea></p>
                                                <p><input class="w3-input w3-round w3-border" type="number" name="price" placeholder="Price" step="any" value ="{{ $listSubject->price }}"></p>
                                                <p><input class="w3-input w3-round w3-border" type="number" name="learning_hours" placeholder="Total Learning Hours" value ="{{ $listSubject->learning_hours }}"></p>
                                                </textarea></p>
                                                <button class="w3-button w3-teal w3-round" type="submit">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>        
        
        <p class="w3-center w3-text-black">Copyright&copy; MyTutor-Erma 281299<p>
            
        <div id="newSubject" class="w3-modal w3-animate-opacity">
            <div class="w3-modal-content w3-round" style="width:500px">
                <header class="w3-row w3-teal"><span onclick="document.getElementById('newSubject').style.display='none'" class="w3-button w3-display-topright w3-large">&times;</span>
                    <h4 class="w3-margin-left">New Subject Form</h4>
                </header>

                <div class="w3-padding">
                    <form action="{{ route('saveSubject') }}" method="POST">
                        {{ csrf_field() }}
                        <p><input class="w3-input w3-round w3-border" type="text" name="title" value="{{ old('title') }}" placeholder="Name" style="text-transform: capitalize"></p>
                        <p><textarea class="w3-input w3-round w3-border" rows="4" name="description" value="{{ old('description') }}" placeholder="Description" style="text-transform: capitalize"></textarea></p>
                        <p><input class="w3-input w3-round w3-border" type="number" name="price" value="{{ old('price') }}" placeholder="Price" step="any"></p>
                        <p><input class="w3-input w3-round w3-border" type="number" name="learning_hours" value="{{ old('learning_hours') }}" placeholder="Total Learning Hours"></p>
                        </textarea></p>
                        <button class="w3-button w3-teal w3-round" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>