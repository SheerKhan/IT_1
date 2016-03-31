<?php
$errormsg = "";
if ($_FILES['file']['size'] > 0) {
    if ($_FILES['file']['size'] <= 1536000) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], "../images/superheroes/" . $_FILES['file']["name"])) {
            $errormsg = "File succesfully uploaded";
            ?>
            <script type="text/javascript">
                parent.document.getElementById("msg").innerHTML = "";
                parent.document.getElementById("file").value = "";
                window.parent.updatepicture("<?php echo '../images/superheroes/' . $_FILES['file']["name"]; ?>");
                parent.document.getElementById("msg").innerHTML = "Image successfully uploaded.";

            </script>
            <?php
        } else {
            $errormsg = "The upload failed";
            ?>
            <script type="text/javascript">
                parent.document.getElementById("msg").innerHTML = "<font color='#ff0000'>There was an error uploading your image. Please try again later.</font>";
            </script>
            <?php
        }
    } else {
        $errormsg = "The file is too big";
        ?>
        <script type="text/javascript">
            window.parent.get_gallery_async();
            parent.document.getElementById("msg").innerHTML = "<font color='#ff0000'>Your file is larger than 1500kb. Please choose a different picture.</font>";
        </script>
        <?php
    }
}
?>

