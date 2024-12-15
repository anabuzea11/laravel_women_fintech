<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #d87ca6;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: 500;
        }
        .table {
            background-color: #ffffff;
        }
        table thead {
            background-color: #d87ca6;
            color: #ffffff;
        }
        .btn{
            background-color:  #d87ca6 ;
            border: 1px solid  #d87ca6;
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
</div>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Evenimente viitoare</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Adaugă Eveniment</a>

    @if($events->isEmpty())
        <p>Nu există evenimente viitoare.</p>
    @else
        <ul class="list-group">
            @foreach($events as $event)
                <li class="list-group-item">
                    <strong>{{ $event->title }}</strong> - {{ $event->event_date }}
                    <br>{{ $event->description }}
                    <div class="mt-2">
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-warning">Editează</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

