<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{ asset('css/userList.css') }}">
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
    
    <h1 class="main">Users</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->country }}</td>
                    <td>
                        <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
