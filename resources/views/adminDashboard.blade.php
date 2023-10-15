<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
    </head>
    <body >

    <nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
            <div class="buttons">
                <form action="{{ route('adminLogout') }}" method="POST">
                @csrf <!-- Include the CSRF token for POST requests -->
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <form action="{{ route('users') }}" method="GET">
            <button class="centered-button1">Show Users</button>
        </form>

        <form action="{{ route('viewFeedback') }}" method="GET">
            <button class="centered-button2">Show Feedback</button>
        </form>

    
        
    </body>
</html>
