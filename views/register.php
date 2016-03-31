<?php
//require '../configurations/config.php';
error_reporting(E_ALL ^ E_NOTICE);
//session_start();
//$userid = $_SESSION['userid'];
//$username = $_SESSION['username'];
?>

<html>
    <?php
    $page_title = 'Add User';
    include '../includes/header.php';
    ?>
    <body>
        <?php
        if ($_POST['registerbtn']) {
            $getuser = $_POST['user'];
//            $getuser = mysql_real_escape_string($getuser);
            $getemail = $_POST['email'];
//            $getemail = mysql_real_escape_string($getemail);
            $getpass = $_POST['pass'];
//            $getpass = mysql_real_escape_string($getpass);
            $getretypepass = $_POST['retypepass'];
//            $getretypepass = mysql_real_escape_string($getretypepass);

            if ($getuser) {
                if ($getemail) {
                    if ($getpass) {
                        if ($getretypepass) {
                            if ($getpass === $getretypepass) {
                                if ((strlen($getemail) >= 7) && (strstr($getemail, "@")) && (strstr($getemail, "."))) {
                                    require("../configurations/config.php");
                                    $query = mysql_query("SELECT * FROM users2 WHERE username='$getuser'");
                                    $numrows = mysql_num_rows($query);
                                    if ($numrows == 0) {
                                        $query = mysql_query("SELECT * FROM users2 WHERE email='$getemail'");
                                        $numrows = mysql_num_rows($query);
                                        if ($numrows == 0) {
                                            $password = md5(md5("HfdsU" . $getpass . "OPIsls"));
                                            $password = mysql_real_escape_string($password);
                                            $date = date("F d, Y");
                                            $date = mysql_real_escape_string($date);
                                            $code = md5(rand(0, 25));
                                            $code = mysql_real_escape_string($code);
//                                            mysql_query("INSERT INTO `users` (`email`, `password`, `name`) VALUES ('eddy@em-creations.co.uk', '" . sha1($password) . "', 'Eddy')");
//                                            mysql_query("INSERT INTO `users2`(`username`, `password`, `email`, `active`, `code`, `date`) VALUES ('" . mysql_real_escape_string($getuser) . "', '" . mysql_real_escape_string($password) . "', '" . mysql_real_escape_string($getemail) . "', '0', '" . mysql_real_escape_string($code) . "', '" . mysql_real_escape_string($date) . "')");
                                            mysql_query("INSERT INTO users2 (`username`, `password`, `email`, `active`, `code`, `date`) VALUES (
                                                   '$getuser', '$password', '$getemail', '0', '$code', '$date'
                                            )") or die(mysql_error());

                                            $query = mysql_query("SELECT * FROM users2 WHERE username='$getuser'");
                                            $numrows = mysql_num_rows($query);
                                            echo "\n numrows: $numrows";
                                            if ($numrows == 1) {
                                                $site = "http://localhost/gallery/Members System";
                                                $webmaster = "SørenA <elzoren@gmail.com>";
                                                $headers = "From: $webmaster";
                                                $subject = "Activate Your Account";
                                                $msg = "Thanks for registering. Click the link below to activate your account.\n";
                                                $msg .= "$site/activate?user=$getuser&code=$code\n";
                                                $msg .= "You must activate your account to login.";

                                                if (mail($getemail, $subject, $msg, $headers)) {
                                                    $errormsg = "You have been registered. You must activate your account from the activation link sent to <b>$getemail</b>";
                                                    $getuser = "";
                                                    $getemail = "";
                                                } else {
                                                    $errormsg = "An error has occured. Your activation email was not sent.";
                                                }
                                            } else {
                                                $errormsg = "An error has occured. Your account was not created";
                                            }
                                        } else {
                                            $errormsg = "There is already a user with that email.";
                                        }
                                    } else {
                                        $errormsg = "There is already a user with that username.";
                                    }
                                    mysql_close();
                                } else {
                                    $errormsg = "You must enter a valid email address to register.";
                                }
                            } else {
                                $errormsg = "Your passwords do not match.";
                            }
                        } else {
                            $errormsg = "Your must retype your password to register";
                        }
                    } else {
                        $errormsg = "You must enter your password to register.";
                    }
                } else {
                    $errormsg = "You must enter your email to register.";
                }
            } else {
                $errormsg = "You must enter your username to register.";
            }
        } else {
            
        }
        $form = "<form action = './register.php' method = 'post'>
                    <table>
                        <tr>
                            <td></td>
                            <td><font color = 'red'>$errormsg</font></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type = 'text' name = 'user' value = '$getuser'></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type = 'email' name = 'email' value = '$getemail'></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type = 'password' name = 'pass' value = ''></td>
                        </tr>
                        <tr>
                            <td>Retype:</td>
                            <td><input type = 'password' name = 'retypepass' value = ''></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type = 'submit' name = 'registerbtn' value = 'Register'></td>
                        </tr>
                    </table>
                </form>";
        echo "$form";
        ?>

    </body>
</html>
