<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Dashboard</title>
    <style>
       * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        td{
          height: 50px;
    padding: 9px 2px;
        }
    button{

            width: 40%;
            background-color: #4A90E2;
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
     caption h2{
        margin-bottom: 20px;
      }
      tbody{
        text-align: center;
      }
      th{
        
        height: 35px;
    text-align: center;
  
    padding: 5px;
      }
       
        body {
          height: 100vh;
          background-color: #F5F7FA;
        }
        .container {
          display: flex;
          justify-content: center;
          position: relative;
          top : 20px;
          
        }
        .upper-container {
          height: 100%;
          /* margin: auto; */
          
          width: 100%;
        }
        table {
          background-color: #ffffff;
          height: 400px;
          width:  800px;
          border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        
        }
        thead th{
          background-color: #4A90E2;
          color: white;
        
}
tr{
  background-color: #f2f2f2;
}
.logout-btn {
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
      .logout-btn:hover {
        background-color: #c0392b;
      }
      .header{
        height : 50px;
        width : 100%;
        background-color : blue;
      }
      .header {
        color: white;
    display: flex
;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    background-color: #4A90E2;
    border-bottom: 2px solid #ccc;
    height: 70px;
    position: sticky;
    top: 0;
    z-index: 10;
}

.pera {
  max-width: 70%; /* Limit width of the text container */
}

.pera h2, .pera p {
  margin: 0; /* Remove default margins */
  line-height: 1.5; /* Better readability */
}

.btn {
  text-align: right; /* Align button to the right */
}
button:hover {
  background-color: #4178C6; /* Slightly darker shade for hover */
}
      </style>
  </head>
  <body>
  <?php
session_start();
  if(!isset($_SESSION['email'])){
    echo "please login first";
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header('Location: login.php');
    exit();
  }
 else {
  require './connectdb.php';
  $data = [];
  $query = "SELECT * FROM user";
  $result = mysqli_query($connect,$query);
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
  }
}
   ?>
   

    <div class="upper-container">
    <div class="header"> 
      <div class="pera">
      <h2>Hello <?php echo $_SESSION['username']; ?>!</h2>
      <p>Welcome to Dashboard
   </p>
      </div>
     <div class="btn">
     <button class="logout-btn" type="button" >Logout</button>
     </div>
    </div>
      <div class="container">
        <table >
          <caption>
           <h2> List of users</h2>
          </caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>User name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if (!empty($data)): ?>
            <?php foreach ($data as $row): ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['password'] ?></td>
              <td>
                <button class="edit" userid="<?php echo $row['id'] ?>">Edit</button>
                <button class="del" userid="<?php echo $row['id'] ?>">Delete</button>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
  <script src="edit&del.js"></script>
</html>
<?php mysqli_close($connect);
  ?>
