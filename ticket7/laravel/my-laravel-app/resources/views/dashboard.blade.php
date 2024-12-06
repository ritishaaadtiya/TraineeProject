<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- home icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>

<body>
    <header>
        <nav>
            <div class="mycontainer">
                <div class="pera">
                    <h2>Hello User</h2>
                    <p>Welcome to the Dashboard
                    </p>
                </div>
                <div class="btn">
                    <button class="create-btn" type="button">Create</button>
                </div>
                <div class="btn">
                    <button class="logout-btn" type="button">Logout</button>
                </div>

            </div>
        </nav>
    </header>
    <main>
        <div class="tablecontainer">

            <table>
                <caption>
                    <h2> List of Tasks</h2>
                </caption>
                <thead>
                    <tr>
                        <th>Task Id</th>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Reading Book</td>
                        <td>15/05/2023</td>
                        <td>High</td>
                        <td>In Progress</td>
                        <td>
                            <button class="edit">Edit</button>
                            <button class="del">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </main>
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>

</html>