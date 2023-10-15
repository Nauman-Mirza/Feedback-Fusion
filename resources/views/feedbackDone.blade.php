<!DOCTYPE html>
<html>
<head>
    <title>Feedback Submitted</title>
    <link rel="stylesheet" href="{{ asset('css/feedbackSubmitted.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <h1 class="main-heading">Feedback Fusion</h1>
            <div class="buttons">
                <form action="{{ route('usersMain') }}" method="GET">
                    @csrf <!-- Include the CSRF token for POST requests -->
                    <button class="home-button">Home</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class="feedback-heading">Feedback Submitted</h1>
    <p class="feedback-heading">Thank you for your feedback.</p>
</body>
</html>
