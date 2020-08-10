<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend> Registration </legend>
            <table>
                <tr>
                    <td>Id </td>
                    <td><input type="text" name="uid" > </td> 
                </tr>
                <tr>
                    <td>Password </td>
                    <td><input type="password" name="upassword" > </td> 
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="ucpassword"> </td> 
                </tr>
                <tr>
                    <?php
                        if($_POST['upassword'] != $_POST['ucpassword']){
                            echo "Password should be matched";
                        }
                    ?>
                </tr>
                <tr>
                    <td> Name </td>
                    <td><input type="text" name="uname" > </td> 
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="uemail"> </td> 
                </tr>
                <tr>
                    <td>User Type [User/Admin]
                    <br>
                    <div>
                        <input type="radio" name="user" value="userrad" />User<br />
                        <input type="radio" name="user" value="adminrad" />Admin<br />
                    </div>
                    <hr>
                    </td>
                </tr>
                
                <tr>
                   <td>
                   <select id="uprofile" name="uprofile">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                   </td> 
                </tr>
                
                
                <tr>
                    <td><input type="submit" name="uregister" value="Register" ></td>
                    <td><a href="./login">Login</a></td>
                </tr>

                <tr>
                    <?php
                        if(isset($_POST['uregister'])){
                            // $myfile = fopen("summertest.txt", "a") or die("Unable to open file!");;
                            $userID = $_POST['uid'];
                            $userName = $_POST['uname'];
                            $userEmail = $_POST['uemail']; 
                            $userPassword = $_POST['upassword'];
                            $userStatus = $_POST['user'];
                            echo $userStatus;

                            if($userStatus == 'userrad') {
                                $userStates = 'User';
                            } else {
                                $userStates = 'Admin';
                            }
                            // if( $_POST["userrad"].checked == true) {
                                
                            // }

                                // Testing DB Connection

                            $connection = mysqli_connect('127.0.0.1', 'root', '', 'mini_project'); 
                            if($connection-> connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "INSERT INTO registration_info(ID,NAME,EMAIL,Password,Type) VALUES ('".$userID."','".$userName."', '".$userEmail."', '".$userPassword."', '".$userStates."')";
                            if($connection->query($sql) === TRUE) {
                                echo "Registration Completed!";
                            } else {
                                echo "ERROR: " . $sql . "<br>" . $conn->error;
                            }
                            // $result = mysqli_query($connection, "select * from registration_info");
                            // while ($row = mysqli_fetch_assoc($result)) {
                            //     echo $row['ID'];
                            //     echo $row['NAME'];
                            //     echo $row['EMAIL'];
                            //     echo $row['Password'];
                            // }

                            
                

                        } else {
                            echo "Please add Profile Description";
                        }
                    ?>
                </tr>
                <!-- For testing -->
                 
            </table>
        </fieldset>
    </form>
</body>
</html>