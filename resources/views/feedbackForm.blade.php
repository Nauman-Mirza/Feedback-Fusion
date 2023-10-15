<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" href="{{ asset('css/feedbackForm.css') }}">
</head>
<body>
<nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
            <div class="buttons">
                <form action="{{ route('usersMain') }}" method="GET">
                    @csrf <!-- Include the CSRF token for POST requests -->
                    <button type="submit">Back</button>
                </form>
            </div>
        </div>
    </nav>


    <h1 class="main">Feedback Form</h1>
    <form method="POST" action="{{ route('saveFeedback') }}">
    @csrf
    <table>
        <tr>
            <td><label for="title">Title:</label></td>
            <td><input type="text" id="title" name="title" class="form-control" required></td>
        </tr>
        <tr>
            <td><label for="description">Description:</label></td>
            <td><textarea id="description" name="description" rows="4" class="form-control" required></textarea></td>
        </tr>
        <tr>
            <td><label for="category">Category:</label></td>
            <td>
                <select id="category" name="category" class="form-control" required>
                    <option value="bugs">Bugs Report</option>
                    <option value="improvement">Improvement</option>
                    <option value="feature">Feature Demand</option>
                </select>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
