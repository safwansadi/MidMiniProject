<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
           <legend>Login </legend>
           <table>
               <tr>
                   <td>User Id </td>
                   <td><input type="text" name="uid" ></td>
                </tr>
                <tr>
                   <td>Password </td>
                   <td><input type="password" name="upassword"></td>
                </tr>
                
                <tr>  
                    <td>
                        <input name="remember" type="checkbox">Remember Me
                        <br/>
                        <hr>
                    </td> 
                </tr>
            

                <tr>
                   <td><input type="submit" name="ulogin" value="Login" ></td>
                   <td><a href="./registration">Register</a></td>
                </tr>

                <tr>
                    <td>
                        <?php
                        if(isset($_POST['ulogin'])){
                            $connection = mysqli_connect('127.0.0.1', 'root', '', 'mini_project');
                            $result = mysqli_query($connection, 'select * from registration_info');
                                $flag=0;
                                while($data = mysqli_fetch_assoc($result)) {
                                    // echo $data['ID'] ;
                                    // echo $data['Password'];
                                    
                                    if($data['ID'] === $_POST['uid'] && $data['Password'] === $_POST['upassword']) {
                                        echo "Login SUCCESSFULLY DONE";
                                        $flag=1;
                                }
                            }

                                if($flag==0) {
                                    echo "Try again with correct password and id ";
                                }
                            }
                        ?>
                    </td>
                </tr>
            
        </fieldset>
    </form>
</body>
</html>