<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <h1>Feedback Fusion</h1>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <table>
                                <tr>
                                    <td>
                                        <label for="email">Email</label>
                                    </td>
                                    <td>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="password">Password</label>
                                    </td>
                                    <td>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
