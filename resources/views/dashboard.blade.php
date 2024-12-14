<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Women in FinTech</title>
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
            margin: 40px auto;
            max-width: 800px;
        }
        .hero h1 {
            font-size: 3rem;
            color: #2c3e50; /* Dark text color */
        }
        .hero p {
            font-size: 1.25rem;
            color: #34495e; /* Subtle dark text */
        }
        .hero hr {
            border: 0;
            border-top: 1px solid #dcdcdc;
            margin: 20px 0;
        }
        .content-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }
        .content-section h2 {
            font-size: 1.5rem;
            color: #2c3e50;
        }
        .content-section ul {
            list-style-type: disc;
            margin-left: 20px;
            color: #34495e;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Women in FinTech</a>
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
    <div class="hero">
        <h1>Welcome to Your Dashboard</h1>
        <p>Empowering women in financial technology through community and collaboration.</p>
        <hr>
        <p>Manage your profile, track your activities, and stay connected with the community.</p>
    </div>

    <!-- Main Content Section -->
    <div class="content-section">
        <h2>Your Recent Activities</h2>
        <ul>
            <li>Completed profile setup</li>
            <li>Joined the "Women in Tech" event</li>
            <li>Invited a new member</li>
        </ul>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 Women in FinTech</p>
    </footer>
</body>
</html>
