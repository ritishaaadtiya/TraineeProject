<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h2>Hello {{$username}}</h2>
                    <p>Welcome to the Dashboard
                    </p>
                </div>
                <div class="select-lang">
                    <select id="lang" name="language">
                        <option value="">Lang</option>
                        <option value="low">English</option>
                        <option value="medium">Hindi</option>
                        <option value="high">French</option>
                    </select>
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
    <main class="main">
        <div class="tablecontainer">

            <table>
                <caption>
                    <h2> List of Tasks</h2>
                </caption>
                <thead>
                    <tr>
                        <th>Task Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Attachment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task['id']}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['description']}}</td>
                        <td>{{$task['due_date']}}</td>
                        <td>{{$task['priority']}}</td>
                        <td>{{$task['status']}}</td>
                        <td>
                            @if ($task->attachment)
                            <!-- Link to view/download the file -->
                            <a href="{{ Storage::url($task->attachment) }}" target="_blank">View Attachment</a>
                            @else
                            No Attachment
                            @endif
                        </td>
                        <td>
                            <button class="edit" data-id="{{$task['id']}}">Edit</button>
                            <button class="del" data-id="{{$task['id']}}">Delete</button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination Links -->


        </div>
        <div style="text-align: center;">
            {{ $tasks->links() }}
        </div>



    </main>
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>

</html>