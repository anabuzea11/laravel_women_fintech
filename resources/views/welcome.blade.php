<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women in FinTech</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
        }
        .navbar {
            background-color: #d87ca6; /* Pink header color */
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff;
        }
        .navbar-brand:hover {
            color: #f8f9fa;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        .hero {
            background-color: #e9f5ff; /* Light blue background */
            padding: 60px;
            border-radius: 8px;
            text-align: center;
            margin: 40px 0;
        }
        .hero h1 {
            font-size: 3rem;
            color: #2c3e50; /* Dark text color */
        }
        .hero p {
            font-size: 1.25rem;
            color: #34495e; /* Subtle dark text */
        }
        .hero .btn {
            background-color: #d87ca6;
            color: #ffffff;
            font-weight: 500;
        }
        .hero .btn:hover {
            background-color: #a65880;
            color: #ffffff;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Women in FinTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.create') }}">Add Member</a>
                    </li>
                    <li>
                        <a href="{{ route('events.index') }}" class="nav-link">Events</a>
                    </li>
                    @guest
                    <!-- Show these links if the user is not logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                        <!-- Show these links if the user is logged in -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container">
        <div class="hero">
            <h1>Welcome to Women in FinTech</h1>
            <p>Empowering women in financial technology through community and collaboration.</p>
            <a href="{{ route('members.create') }}" class="btn btn-lg">Join Now</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Women in FinTech
    </footer>

    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
