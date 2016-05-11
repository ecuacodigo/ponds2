<?php

	$ruta_fondo_fotos = "assets/images/fondo_foto.png";
    $p_ruta_imagen = "assets/fotos/";
    $file_name = "1462060388131";
    $form_nombre_completo = "Lily Mary Constantine";
    $form_soy = "Soy luchadora y muy espiritual";
    $form_edad = "62";
   

    putenv('GDFONTPATH=' . realpath('./assets/fonts/'));
    $fuente_nombre = 'dalton.ttf'; //'assets/fonts/dalton.ttf';
    $fuente_frase = 'daniela.otf'; //'assets/fonts/daniela.otf';
   
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
    ob_end_clean();
    header( 'Content-Type: image/png' );
	imagepng($rotated,$p_ruta_imagen."frase.png");

    imagecopy($destino, $rotated, 740, 880, 0, 0, 460, 162);
    
	imagedestroy($destino_frase);
    imagedestroy($rotated); 
   

    header( 'Content-Type: image/png' );
	imagepng($destino,$p_ruta_imagen."IMPRIMIR_".$file_name.".png");
	imagedestroy($destino);
	imagedestroy($origen);
    
    /*unlink($p_ruta_imagen."IMP_JPG2_".$file_name.".jpg");
    unlink($p_ruta_imagen."IMP_JPG3_".$file_name.".jpg");
    unlink($p_ruta_imagen."IMP_PNG_".$file_name.".png");
    unlink($p_ruta_imagen."IMP_PNG_ROT_".$file_name.".png");*/
  
fclose($myfile);    

?>