<!DOCTYPE html>
<html>
<head>
    <title>Comments Form</title>
    <link rel="stylesheet" href="{{ asset('css/adminComment.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
            <div class="buttons">
                <form action="{{ route('adminLogout') }}" method="POST">
                    @csrf
                    <button>Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class="main">Comments View</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->status }}</td>
                    <td>
                        <form action="{{ route('disableComments', ['id' => $comment->id]) }}" method="POST">
                            @csrf
                            <button class="table-button">Disable Comment</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
