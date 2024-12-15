<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editează Eveniment</h1>

    <form method="POST" action="{{ route('events.update', $event) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titlu</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descriere</label>
            <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="event_date">Data evenimentului</label>
            <input type="date" name="event_date" id="event_date" class="form-control" value="{{ $event->event_date }}" required>
            @error('event_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvează modificările</button>
    </form>
</div>
@endsection

