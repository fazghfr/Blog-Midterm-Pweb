<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:700);

        *, *:before, *:after {
        box-sizing: border-box;
        }
        html {
            height: 100%;
        }
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #ffffff; 
            height: 100%;
            padding: 10px;
        }

        a {
        color: #black !important;
        text-decoration:none;
        }
        a:hover {
        color: #black !important;
        text-decoration:none;
        }

        .text-wrapper {
            height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        }

        .title {
            font-size: 3em;
            font-weight: 700;
            color: #EE4B5E;
        }

        .isi {
            font-size: 18px;
            text-align: center;
            margin:30px;
            padding:20px;
            color: black;
        }
        .buttons {
            margin: 30px;
                font-weight: 700;
                border: 2px solid #EE4B5E;
                text-decoration: none;
                padding: 15px;
                text-transform: uppercase;
                color: black;
                border-radius: 26px;
                transition: all 0.2s ease-in-out;
                display: inline-block;
                
                .buttons:hover {
                    background-color: #EE4B5E;
                    color: black;
                    transition: all 0.2s ease-in-out;
                }
        }
        }
            
    </style>
    <title>Document</title>
</head>
<body>
    <div class="text-wrapper">
        <div class="title" data-content="404">
            403 - ACCESS DENIED
        </div>

        <div class="isi">
            You are not authorised to view this Blog Post.<br>
            Either you are not logged in or you are not the owner of this post.
        </div>

        <div class="buttons">
            <a class="button" href="{{ url('/') }}" method="GET">Go to homepage</a>
        </div>
    </div>
</body>
</html>