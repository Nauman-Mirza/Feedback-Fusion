<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="stylesheet" href="{{ asset('css/userDashboard.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
            <div class="buttons">
                <form action="{{ route('giveFeedback') }}" method="GET">
                    @csrf <!-- Include the CSRF token for POST requests -->
                    <button type="submit">Add Feedback</button>
                </form>
                <form action="{{ route('userLogout') }}" method="POST">
                    @csrf <!-- Include the CSRF token for POST requests -->
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class='main'>All Feedbacks</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Submitted By</th>
                <th>Total Votes</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->title }}</td>
                    <td>{{ $feedback->category }}</td>
                    <td>{{ $feedback->user->name }}</td> <!-- Display the user's name -->
                    <td>{{ $feedback->vote_count }}</td>
                    <td>
                    <form action="{{ route('viewComments', ['id' => $feedback->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Comments</button>
                    </form>
                    </td>

                    <td>
                    <form action="{{ route('voteFeedback', ['id' => $feedback->id]) }}" method="POST">
                        @csrf                    
                        <button type="submit">Vote</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
