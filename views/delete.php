<?php

$errormsg = "";
$folder = "../images/superheroes";
$dir = $folder ."/";
$title = $_POST['title'];
$filename = $title;
$format = ".png";
$src = "$dir$filename$format";
$lol = "lol";
if(file_exists($src)) {
    $errormsg = "The file $file exists";
    if(unlink($src)){
        
    }else{
        $errormsg = "Failed to delete title: $title";
    }
}else{
    $errormsg = "No files with title: $title";
}
?>
<script type="text/javascript">
    window.parent.get_gallery_async();
    parent.document.getElementById("msg").innerHTML = "<?php echo $errormsg ?>";
</script>
<?php
?>

