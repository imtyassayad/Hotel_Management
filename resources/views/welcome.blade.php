<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Management</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .page{
            width: 100%;
            height: 100vh;
            display:flex;
           justify-content: center;
           align-items: center;
           flex-direction: column;
            background-size: cover;
            background-position: center;
            color: #FFF;
            background-image: url('{{asset('web/assets/img/welcome_back.jpg')}}');


        }
        .container{
            background-color: red;
            width: 100%;
            height: 100vh;
        }
        h3 {
            font-size: 20px;
            text-transform: capitalize;
            padding: 10px;
        }
        h1{
            font-size: 50px;
        }
        p{
            font-size: 18px;
        }
        a{
            font-size: 20px;
            font-weight: bold;
            color: red;
            /* text-decoration: none; */
        }
        @media only screen and (max-width: 600px) {
            .page{
                width: 100%;
                height: 100vh;
                background-size: cover;
                background-repeat: no-repeat;
                background-image: url('{{asset('web/assets/img/mobile_back.jpg')}}');
            }

            h1{
                font-size: 40px;
                margin: 15px auto;
            }
            h3{
                font-size:22px;
            }
            p{
                font-size: 18px;
                margin-bottom: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="page">
        <h3>Welcome to</h3>
        <h1>ZIA INNOVATION</h1>
        <P>We are comming soon!</P>
        <P>Check Out Our <a href="{{route('bms.index')}}">B.M.S</a> System</P>

        {{-- <div class="container"></div> --}}
    </div>
</body>
</html>
