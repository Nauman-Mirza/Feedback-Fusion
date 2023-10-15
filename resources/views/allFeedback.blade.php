<!DOCTYPE html>
<html>
<head>
    <title>Feedback List</title>
    <link rel="stylesheet" href="{{ asset('css/feedbackList.css') }}">
</head>
<body>
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
    <h1 class='main'>Feedback List</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Submitted By</th>
                <th>Total Votes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->title }}</td>
                    <td>{{ $feedback->description }}</td>
                    <td>{{ $feedback->category }}</td>
                    <td>{{ $feedback->user->name }}</td>
                    <td>{{ $feedback->vote_count }}</td>
                    <td>
                        <form action="{{ route('adminViewComments', ['id' => $feedback->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Comments</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
