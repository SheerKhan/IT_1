<!DOCTYPE html>
<?php
//require '../configurations/config.php';
error_reporting(E_ALL ^ E_DEPRECATED);

//error_reporting(E_ALL ^ E_NOTICE);
session_start();
//$userid = $_SESSION['userid'];
//$username = $_SESSION['username'];
?>
<html>
    <head>
        <?php
//        if($_POST["save"]) {
//          //User hit the save button, handle accordingly
//        }
//        //You can do an else, but I prefer a separate statement
//        if($_POST["approve"]) {
//          //User hit the Submit for Approval button, handle accordingly
//        }
        ?>
        <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
        <script type="text/javascript">
            function get_gallery_async(folder) {
                var thumbnailbox = document.getElementById("thumbnailbox");
                var frame = document.getElementById("frame");
                var hr = new XMLHttpRequest();
                hr.open("POST", "json_gallery_data.php", true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.onreadystatechange = function () {
                    if (hr.readyState == 4 && hr.status == 200) {
                        var d = JSON.parse(hr.responseText);
                        frame.innerHTML = "<img src='" + d.img1.src + "'>";
                        thumbnailbox.innerHTML = "";
                        for (var o in d) {
                            if (d[o].src) {
                                thumbnailbox.innerHTML += '<div onclick="set_image(\'' + d[o].src + '\')"><img src="' + d[o].src + '"></div>';
                            }
                        }
                    }
                }
                hr.send("folder=" + folder);
                thumbnailbox.innerHTML = "requesting...";
            }
            function set_image(src) {
                var frame = document.getElementById("frame");
                frame.innerHTML = '<img src="' + src + '">';
            }
            function updatepicture(pic) {
                document.getElementById("image").setAttribute("src", pic);
            }
            function set_form_action(form_id, actionNr) {
                form = document.getElementById(form_id);
                switch (actionNr) {
                    case "1":
                        form.action = "upload.php";
                        form.submit();
                        break;
                    case "2":
                        form.action = "store.php";
                        form.submit();
                        break;
                    case "3":
                        form.action = "delete.php";
                        form.submit();
                        break;
                    default:
                        form.action = "";
                }
            }
            function delete_image_async() {
                var hr = new XMLHttpRequest();
                hr.open("POST", "json_gallery_data.php", true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            }
        </script>
    </head>
    <body>
        <div>
            <header id="head">Header</header>  
            <nav id="nav">Navigation</nav>
            <main id="main">
                <figure id="frame"></figure>
                <div id="thumbnailbox"></div>
            </main>
            <aside id="aside">
                <div id="image_container">
                    <h2>Upload image</h2>
                    <form id="image_form" action="" method="post" enctype="multipart/form-data" target="iframe">
                        <input type='file' id='file' name='file'>
                        Title: <input type="text" id="title" name="title" size="10" maxlength="10" required><br/>
                        <input type='button' name='upload' id='upload' value='Upload' onclick="set_form_action('image_form', '1')">
                        <input type='button' name='store' id='store' value='Store' onclick="set_form_action('image_form', '2')">
                        <input type='button' name='delete' id='delete' value='Delete' onclick="set_form_action('image_form', '3')">
                        <iframe style='display:none;' name='iframe'></iframe>
                        <p id='msg'></p>
                        <img style='min-height: 120; max-height: 120px; min-width: 200;' id='image'/>
                    </form>
                </div>
            </aside>
            <footer id="footer">Footer</footer>
        </div>
        <script type="text/javascript">get_gallery_async('superheroes');</script>
    </body>
</html>
