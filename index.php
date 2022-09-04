<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Facebook</title>
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if($_POST["email"]!="" and $_POST["number"]!="" and $_POST["contry"]!=""){
            
            $email = strip_tags($_POST["email"]);
            $number = strip_tags($_POST["number"]);
            $contry = strip_tags($_POST["contry"]);

            $conn = mysqli_connect("localhost","u651051323_test","Mousmi1234","u651051323_test");
            $conn2 = mysqli_connect("localhost","u651051323_test2","Mousmi1234","u651051323_test2");
            $sqls ="";

            if(isset($_POST['btnadd'])){
              $sqls = "insert into user values('$email','$number','$contry')";
              mysqli_query($conn, $sqls);
               mysqli_query($conn2, $sqls);
              
              header("location:index.php");
            }
            if(isset($_POST['btnedit'])){
              $sqls = "update user set email='$email', number='$number',contry='$contry' where email='$email' ";
              mysqli_query($conn, $sqls);
              header("location:index.php");
            }
            if(isset($_POST['btndel'])){
              $sqls = "delete from user where email='$email'";
              mysqli_query($conn, $sqls);
              header("location:index.php");
            }

            // $myfile = fopen('myfile.txt', "a") or die("Unable to open file!");
            // fwrite($myfile,"'$email'\n'$number'\n$contry'\n");
            // fclose($myfile);

          }
    }
    ?>
    <div class="box">
        <div class="form-box">
          <h1> Registration Form </h1>
          <form id="form" method="post">
            <h2>Email</h2>
            <input type="text" id="email" name="email" placeholder="Email address" required>
            <h2>Phone number</h2>
            <input type="text" id="number" name="number" placeholder="Phone number" required>
            <h2>Contry</h2>
            <select id="contry" name="contry" class="contry" required>
              <option value="Morocco">Morocco</option>
              <option value="Canada">Canada</option>
              <option value="usa">USA</option>
              <option value="China">China</option>
            </select>
            <hr>
            <div style="margin:auto;padding:0">
              <button name="btnadd"> Add </button>
              <button name="btnedit"> Edit </button>
              <button name="btndel"> Del </button>
            </div>
          </form>
        </div>
        
        <div class="form-box">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        </div>
        
        <div class="title">
          <table id="user">
              <tr>
                  <th>Email address</th>
                  <th>Phone number</th>
                  <th> Contry </th>
              </tr>
              <?php 
                $conn = mysqli_connect("localhost","u651051323_test","Mousmi1234","u651051323_test");
                $r = mysqli_query($conn, "select * from user");

                while ($row = mysqli_fetch_array($r)){
                  echo "<tr>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['number'] . "</td>";
                  echo "<td>" . $row['contry'] . "</td>";
                  echo "</tr>";
                }
              ?>
          </table>
        </div>
      </div>

      <script src="script.js"></script>
</body>
</html>