<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members List</title>
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
        .table {
            background-color: #ffffff; /* White background for table */
        }
        table thead {
        background-color: #d87ca6; /* Pink */
        color: #ffffff; /* White */
        }
        table tbody tr:nth-child(odd) {
        background-color: #ffffff; /* White for Odd Rows */
        }
        /* Edit Button - Yellow */
        .btn-edit {
            background-color:rgb(244, 200, 221);
            border-color: rgb(244, 200, 221);
        }
        .btn-edit:hover {
            background-color: rgb(213, 72, 136); /* Darker Yellow on Hover */
        }

        /* Delete Button - Red */
        .btn-delete {
            background-color: #d87ca6;
            border-color: #d87ca6;
        }
        .btn-delete:hover {
            background-color: #e63946; /* Darker Red on Hover */
        }
        .btn-primary {
            background-color: #d87ca6;
            border-color: #d87ca6;
        }
        .btn-primary:hover {
            background-color: #a65880;
            border-color: #a65880;
        }
        h1 .text-primary{
            color: #d87ca6;
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
    <!-- Members List -->
    <div class="container my-5">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Members List</h1>
            <a href="{{ route('members.create') }}" class="btn btn-primary">Add Member</a>
        </header>

        <!-- Members Table -->
        <table class="table table-striped table-bordered shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profession</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->profession }}</td>
                        <td>
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-edit">Edit</a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('members.export') }}" class="btn btn-primary">Exportă CSV</a>

    </div>

    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
