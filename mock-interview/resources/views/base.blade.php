<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Online Mock Interview')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f8f9fa;
        }

        header {
            background-color: #e5eaee;
            color:rgb(84, 149, 214);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .rounded-button {
            color: white; /* White text */
            border: none; /* Remove default border */
            padding: 10px 20px; /* Add some padding */
            font-size: 16px; /* Set font size */
            border-radius: 20px; /* Make corners rounded */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s; /* Smooth hover effect */
        }
        header ul{
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        header .col-6 ul li {
            margin-right: 20px;
            padding: 5px 10px;
            color: black;
        }
        
        header .col-3 ul li {
            padding: 10px 10px;
            color: white;
        }

        header a{
            color:rgb(133, 51, 51);
            text-decoration: none;
        }

        header a:hover {
            color :rgb(223, 97, 14);
        }
        
        main {
            padding: 20px;
            min-height: calc(100vh - 160px); /* Adjust for header and footer height */
        }

        header img{
            width: 20%;
            height: auto;
            border-radius: 50%;
        }
        .login-btn{
            color:rgb(50, 58, 66);
        }
        .login-btn:hover{
            color:rgb(196, 114, 32);
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3 text-start">
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{ asset('images/images2.png') }}" alt="Logo"></a>
                        <span><b><a href="{{route('home')}}">Test Yourself</a></b></span>
                    </div>
                </div>
                <div class="col-6">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Services</a></li>
                    </ul>
                </div>
                <div class="col-3 text-end">
                    <div class="auth-buttons">
                        <ul>
                            <li><a class="btn rounded-button login-btn" href="#">Login</a></li>
                            <li><a class="btn btn-danger rounded-button" href="#">Start for Free</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Online Mock Interview. All Rights Reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>
</body>
</html>
