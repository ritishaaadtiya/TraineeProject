<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        body {
            background-color: #F5F7FA;
            margin: 0;
            padding: 0;
        }

        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        form input,
        form textarea,
        form select,
        form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #f0eded;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form textarea {
            resize: none;
        }

        form button {
            background-color: #4A90E2;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #357ABD;
            /* Slightly darker shade on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        h3 {
            font-size: x-large;
            text-align: center;
        }

        .error-msg {
            position: relative;
            bottom: 9px;
            left: 8px;
            font-size: 14px;
            color: red;

        }

        input[type="file"] {
            border: 2px solid #f0eded;
            border-radius: 4px;
            padding: 10px;
            background-color: #fff;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background-color: #4A90E2;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #357ABD;
        }

        /* up */


        .custom-file-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #f0eded;
            border-radius: 4px;
            box-sizing: border-box;
        }





        .file-error {
            font-size: 14px;
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <form>
            <h3>Update Task</h3>



            <label for="task-title">Title</label>
            <input type="text" id="task-title" name="task-title" placeholder="Enter Task Title" value="{{$tasks['title']}}">
            <div class="titlerror"></div>
            <label for="desc">Description</label>
            <textarea id="desc" name="desc" placeholder="Enter Task Description">{{$tasks['description']}}</textarea>
            <div class="descerror"></div>
            <label for="due-date">Due Date</label>
            <input type="date" id="due-date" name="due-date" value="{{$tasks['due_date']}}">

            <label for="priority">Priority</label>
            <select id="priority" name="priority">
                <option value="">{{$tasks['priority']}}</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">{{$tasks['status']}}</option>
                <option value="pending">Pending</option>
                <option value="progress">In Progress</option>
                <option value="complete">Completed</option>
            </select>
            <label for="attachment">Attachment</label>
            <div class="custom-file-input">
                @if (!empty($tasks->attachment))
                <a href="{{ asset('storage/' . $tasks->attachment) }}" download>
                    {{ basename($tasks->attachment) }}
                </a>
                <input type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.docx">

                @else
                <input type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.docx">
                @endif

            </div>
            <div class="file-error"></div>
            <button class="btn" data-id="{{$tasks['id']}}" type="button">Update</button>

        </form>
    </div>
    <script src="{{asset('js/update.js')}}"></script>
</body>

</html>
<!-- Topics Covered: Created a task management system, designed the form, and connected it with the database. Developed a model to store tasks for logged-in users. -->