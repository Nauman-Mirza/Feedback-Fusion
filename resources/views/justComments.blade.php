<!DOCTYPE html>
<html>
<head>
    <title>Comments Form</title>
    <link rel="stylesheet" href="{{ asset('css/justComment.css') }}">
</head>
<body>
    
    <nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
            <div class="buttons">
                <button onclick="goBack()">Back</button>
            </div>
        </div>
    </nav>

    <h1 class="main">Comments View</h1>
    <table>
        <thead>
            <tr>
                <th>Comment By</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->comment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
