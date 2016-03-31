<?php
//require '../configurations/config.php';
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>
<html>
    <?php
    $page_title = 'Login';
    include '../includes/header.php';
    ?>
    <body>
        <?php
        if ($username && $userid) {
            $errormsg = "You are already logged in as <b>$username</b>. <a href='./gallery.php'>Click here</a> to go to the member page";
        } else {
            
            $form = "<form action ='./login.php' method='post'>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type='text' name='user'/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='pw'/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='loginbtn' value='Login'/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href='./register.php'>Register</a>   <a href='./forgotpass.php'>Forgot your password</a></td>
                </tr>
            </table>       
        </form>";

            //                <tr>
//                    <td>Email:</td>
//                    <td><input type='email' name='email'/></td>
//                </tr>
            if ($_POST['loginbtn']) {
                $user = $_POST['user'];
                $pw = $_POST['pw'];
                echo "$user - $pw <hr />";
//
                if ($user) {
                    if ($pw) {
                        require ("../configurations/config.php");
                        $pw = md5(md5("HfdsU" . $pw . "OPIsls"));
                        $query = mysql_query("SELECT * FROM users2 WHERE username ='$user'");
                        $numrows = mysql_num_rows($query);
                        if ($numrows == 1) {
                            $row = mysql_fetch_assoc($query);
                            $dbid = $row['id'];
                            $dbuser = $row['username'];
                            $dbpw = $row['password'];
                            $dbactive = $row['active'];
                            if ($pw == $dbpw) {
                                if ($dbactive == 1) {
                                    // set session info
                                    $_SESSION['userid'] = $dbid;
                                    $_SESSION['username'] = $dbuser;

                                    $errormsg = "You have been logged in as <b>$dbuser</b>. <a href='./gallery.php'>Click here</a> to go to the member page";
                                } else {
                                    $errormsg = "You must activate your account to login. $form";
                                }
                            } else {
                                $errormsg = "You did not enter the correct password. $form";
                            }
                        } else {
                            $errormsg = "The username you entered was not found. $form";
                            mysql_close();
                        }
                    } else {
                        $errormsg = "You must enter your password. $form";
                    }
                } else {
                    $errormsg = "You must enter your username. $form";
                }
            } else {
                echo $form;
            }
        }
        echo "<table>
                    <tr>
                        <td></td>
                        <td><font color = 'red'>$errormsg</font></td>
                    </tr>
                </table>";
        
        ?>
    </body>
</html>



