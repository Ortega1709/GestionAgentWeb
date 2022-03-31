<?php 
    
    $save = "../assets/images/agents.png";
    $img = '<img src="'.$save.'">';
    
    $info = getimagesize($save);
    $mime = $info['mime'];

    echo $img."</br>";
    echo $mime;
    echo "</br></br></br>";

    list($width,$height) = getimagesize($save);
    $modwidth = 200;
    $diff = $width / $modwidth;
    $modheight = $height / $diff;

    $tn = imagecreatetruecolor($modwidth,$height);
    $image = imagecreatefrompng($save);
    imagecopyresampled($tn,$image,0,0,0,0,$modwidth,$modheight,$width,$height);

    imagepng($tn,$save);
    echo '<img src="'.$save.'">';
?>