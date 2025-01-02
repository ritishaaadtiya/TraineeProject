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

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .mycontainer {
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background-color: #4a90e2;
            border-bottom: 2px solid #ccc;
            height: 70px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .pera {
            max-width: 70%;
            /* Limit width of the text container */
        }

        .pera h2,
        .pera p {
            margin: 0;
            /* Remove default margins */
            line-height: 1.5;
            /* Better readability */
        }

        .logout-btn {
            font-size: 16px;
            font-weight: bold;
            position: absolute;
            top: 15px;
            right: 10px;
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100px;
        }

        .create-btn {
            font-size: 16px;
            font-weight: bold;
            position: absolute;
            top: 15px;
            right: 135px;
            background-color: #218838;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100px;
        }

        .create-btn:hover {
            background-color: #1e7e34;
        }



        .logout-btn:hover {
            background-color: #c0392b;
        }

        .tablecontainer {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        table {
            background-color: #ffffff;
            height: 400px;
            width: 800px;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        thead th {
            background-color: #4a90e2;
            color: white;
        }

        tr {
            background-color: #f2f2f2;
        }

        caption h2 {
            margin-bottom: 20px;
        }

        tbody {
            text-align: center;
        }

        th {
            height: 35px;
            text-align: center;

            padding: 5px;
        }

        td {
            height: 50px;
            padding: 9px 2px;
        }

        button {
            width: 40%;
            background-color: #4a90e2;
            /* Use a bright color like blue */
            color: white;
            /* Contrast color */
            border: none;
            border-radius: 5px;
            padding: 9px 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
    </style>
</head>

<body>
    <x-header />
    <div class="container">

        <form>
            <h3>Task Management</h3>
            <label for="task-title">Title</label>
            <input type="text" id="task-title" name="task-title" placeholder="Enter Task Title">
            <div class="titlerror"></div>
            <label for="desc">Description</label>
            <textarea id="desc" name="desc" placeholder="Enter Task Description"></textarea>
            <div class="descerror"></div>
            <label for="due-date">Due Date</label>
            <input type="date" id="due-date" name="due-date">

            <label for="priority">Priority</label>
            <select id="priority" name="priority">
                <option value="">Please select</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Please select</option>
                <option value="pending">Pending</option>
                <option value="progress">In Progress</option>
                <option value="complete">Completed</option>
            </select>
            <label for="attachment">Attachment</label>
            <input type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.docx">
            <div class="file-error"></div>

            <button class="btn" type="button">Create</button>
        </form>
    </div>
    <script src="{{asset('js/task.js')}}"></script>
</body>

</html>