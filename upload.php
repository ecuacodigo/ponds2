<?php
    $target_dir = "file:///storage/emulated/0/DCIM/Camera/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $myfile = fopen("txt_participantes.txt", "a") or die("Unable to open file!");
    
    $nombre_archivo_completo = basename($_FILES["fileToUpload"]["name"]);
    $file_name = substr($nombre_archivo_completo, 0, -4);

	$ruta_fondo_fotos = "assets/images/fondo_foto.png";
    $p_ruta_imagen = "assets/fotos/";
    $p_ruta_para_imprimir = "fotos_imprimir/";
    $form_nombre_completo = $_POST["form_nombre_completo"]; //"Lily Mary Constantine";
    $form_soy = $_POST["form_como_te_defines"]; //"Soy luchadora y muy espiritual";
    $form_edad = $_POST["form_edad"]; //"62";
    $form_telefono = $_POST["form_telefono"];
    $form_madre = $_POST["form_madre"];
    
    date_default_timezone_set('America/Guayaquil');
    $dt = new DateTime();
    $fecha = $dt->format('Y-m-d H:i:s');    
    
    fwrite($myfile, $fecha."|".$form_madre."|".$form_nombre_completo."|".$form_edad."|".$form_telefono."|".$form_soy."\n");
    
    //putenv('GDFONTPATH=' . realpath('.'));
    
    //$fontpath = realpath('./assets/fonts/');
    //putenv('GDFONTPATH='.$fontpath);
    //$fuente_nombre = 'dalton'; 
    //$fuente_frase = 'dalton'; 
    
    $fuente_nombre = 'assets/fonts/dalton.ttf';
    $fuente_frase = 'assets/fonts/daniela.otf';    
    
    $im = imagecreatetruecolor(400, 30);
    $color_rojo = imagecolorallocate($im, 220, 73, 66);
    $color_rojo_sombra = imagecolorallocate($im, 237, 140, 140);
    $color_blanco = imagecolorallocate($im, 255, 255, 255);
    $color_blanco_sombra = imagecolorallocate($im, 245, 245, 245);
    $color_negro = imagecolorallocate($im, 0, 0, 0);
    $color_sombra = imagecolorallocate($im, 97, 97, 97);
    
    $degrees = 8;
    
    $im = imagecreatefromjpeg($p_ruta_imagen.$file_name.".jpg");
    $rotated = imagerotate( $im, 270, 0);
    imagejpeg($rotated,$p_ruta_imagen."IMP_JPG2_".$file_name.".jpg");    
    imagedestroy($im);
    imagedestroy($rotated);    
    
    $im = imagecreatetruecolor(403, 580);
    $source = imagecreatefromjpeg($p_ruta_imagen."IMP_JPG2_".$file_name.".jpg");
    imagecopyresized($im, $source, 0, 0, 0, 100, 403, 717, 1152, 2048);
    imagejpeg($im,$p_ruta_imagen."IMP_JPG3_".$file_name.".jpg");

	$im = imagecreatefromjpeg($p_ruta_imagen."IMP_JPG3_".$file_name.".jpg");
	imagepng($im,$p_ruta_imagen."IMP_PNG_".$file_name.".png");
	imagedestroy($im);
    
    $im = imagecreatefrompng($p_ruta_imagen."IMP_PNG_".$file_name.".png");
    $transparency = imagecolorallocatealpha( $im,0,0,0,127 );
    $rotated = imagerotate( $im, $degrees, $transparency, 1);
    imagealphablending( $rotated, false );
    imagesavealpha( $rotated, true );
    ob_end_clean();
    header( 'Content-Type: image/png' );
	imagepng($rotated,$p_ruta_imagen."IMP_PNG_ROT_".$file_name.".png");
    imagedestroy($im);
    imagedestroy($rotated);
        
    $destino = imagecreatefrompng($ruta_fondo_fotos);
	$origen = imagecreatefrompng($p_ruta_imagen."IMP_PNG_ROT_".$file_name.".png");
	$w = imagesx($destino); 
	$h = imagesy($destino);

	$posx = 686;
	$posy = 309; 
	imagecopy($destino, $origen, $posx, $posy+2, 0, 0, 480, 631);
    

    $fuente = imageloadfont('./daniela.gdf');
    imagestring($destino, $fuente, 100, 1050, $form_nombre_completo, $color_rojo);   
    
    $fuente = imageloadfont('./daniela2.gdf');
    imagestring($destino, $fuente, 100, 1085, $form_edad." años", $color_blanco);     
    
    $destino_frase = imagecreatefrompng("assets/images/fondo_frase.png");    
    $fuente = imageloadfont('./frase4.gdf');
    imagestring($destino_frase, $fuente, 0, 0, $form_soy, $color_negro);
    imagestring($destino_frase, $fuente, 1, 1, $form_soy, $color_negro);    

    $transparency = imagecolorallocatealpha( $destino_frase,0,0,0,127 );
    $rotated = imagerotate( $destino_frase, 8, $transparency, 1);
    imagealphablending( $rotated, false );
    imagesavealpha( $rotated, true );

    header( 'Content-Type: image/png' );
	imagepng($rotated,$p_ruta_imagen."frase.png");

    imagecopy($destino, $rotated, 740, 880, 0, 0, 460, 162);
    
	imagedestroy($destino_frase);
    imagedestroy($rotated); 


	imagepng($destino,$p_ruta_imagen."IMP_".$file_name.".png");
	imagedestroy($destino);
	imagedestroy($origen);

    $origen = imagecreatefrompng($p_ruta_imagen."IMP_".$file_name.".png");
    header( 'Content-Type: image/jpeg' );
	imagejpeg($origen,$p_ruta_para_imprimir."IMPJP_".$file_name.".jpg");
	imagedestroy($origen);    
    
    /*unlink($p_ruta_imagen."frase.png");
    unlink($p_ruta_imagen."IMP_JPG2_".$file_name.".jpg");
    unlink($p_ruta_imagen."IMP_JPG3_".$file_name.".jpg");
    unlink($p_ruta_imagen."IMP_PNG_ROT_".$file_name.".png");
    unlink($p_ruta_imagen."IMP_PNG_".$file_name.".png");*/
    
    echo $p_ruta_para_imprimir."IMPJP_".$file_name.".jpg";


?>