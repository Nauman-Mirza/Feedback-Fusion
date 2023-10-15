<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
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
                    <div class="card-header">Sign Up</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('userRegister') }}">
                            @csrf
                            <table>
                                <tr>
                                    <td>
                                        <label for="name">Name</label>
                                    </td>
                                    <td>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </td>
                                </tr>
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
                                <tr>
                                    <td>
                                        <label for="age">Age</label>
                                    </td>
                                    <td>
                                        <input type="number" id="age" name="age" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="gender">Gender</label>
                                    </td>
                                    <td>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="dob">Date of Birth</label>
                                    </td>
                                    <td>
                                        <input type="date" id="dob" name="dob" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="number">Phone Number</label>
                                    </td>
                                    <td>
                                        <input type="text" id="number" name="number" class="form-control" required maxlength="11">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Address</label>
                                    </td>
                                    <td>
                                        <input type="text" id="address" name="address" class="form-control" required maxlength="150">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="country">Country</label>
                                    </td>
                                    <td>
                                        <input type="text" id="country" name="country" class="form-control" required>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
