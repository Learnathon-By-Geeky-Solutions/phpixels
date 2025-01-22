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
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            color: white;
        }

        header .col-3 ul li {
            padding: 10px 10px;
            color: white;
        }

        header a{
            color: white;
            text-decoration: none;
        }

        header a:hover {
            font-weight: bold;
            color :rgb(236, 180, 9);
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
                        <img src="{{ asset('images/images2.png') }}" alt="Logo">
                        <span>Test Yourself</span>
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
                            <li><a class="btn btn-warning" href="#">Login</a></li>
                            <li><a class="btn btn-danger" href="#">Start for Free</a></li>
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
