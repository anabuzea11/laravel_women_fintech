<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
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
        .btn-primary {
            background-color: #d87ca6;
            border-color: #d87ca6;
        }
        .btn-primary:hover {
            background-color: #a65880;
            border-color: #a65880;
        }.mb-4{
            color:  #d87ca6;
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
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adaugă Eveniment</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Titlu</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descriere</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="event_date">Data evenimentului</label>
            <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}" required>
            @error('event_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Adaugă Eveniment</button>
    </form>
</div>
@endsection

