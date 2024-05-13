<?php
    if($_POST){
        $cant = count($_POST)/2;
        $j = 1;
        $Fx = 0;
        $Fy = 0;
        while($j <= $cant){
            $resX = ($_POST['txtF'.$j] * cos(deg2rad($_POST['txtA'.$j])));
            $resY = ($_POST['txtF'.$j] * sin(deg2rad($_POST['txtA'.$j])));
            $Fx= $Fx + $resX;
            $Fy= $Fy + $resY;
            $j = $j + 1;
        }
        $Fr = sqrt(pow($Fx,2) + pow($Fy,2));
        $tg0 = $Fy/$Fx;
        $res = atan($tg0);
        $angulo = ceil(rad2deg($res));
        if ($angulo < 0){
            $angulo = $angulo + 360;
        }
        echo "<h1>RESULTADOS</H1>";
        echo "ΣFx = "; echo $Fx;
        echo "<br>"; 
        echo "ΣFy = "; echo $Fy;
        echo "<br>"; 
        echo "Fr = "; echo $Fr; 
        echo "<br>";
        echo "θ = "; echo $angulo;
        echo "<h2>GRAFICA<h2>";
        $im=imagecreate (600,600) or die("GD library not activate");
        $backgroung_color= imagecolorallocate ($im, 255,255,255); 
        $blue=imagecolorallocate($im,255,0,0);
        $black=imagecolorallocate($im,0,0,0);
        imageline ($im, 600/2,0,600/2,600, $black);
        imageline ($im, 0,600/2,600,600/2, $black);
        $angle= $angulo;
        $angle_rad = deg2rad($angle);
        $line_length = 250;
        //CALCULAR LAS CORDENADAS
        $x2 = 600 / 2 + $line_length * cos($angle_rad);
        $y2 = 600 / 2 - $line_length * sin($angle_rad);
        //DIBUJAR LA LINEA
        imageline($im, 600 / 2, 600 / 2, $x2, $y2, $blue);
        // Establecer el tipo de contenido de la imagen
        // Mostrar la imagen
        imagepng ($im, "demo image.png");
    ?>
    <img src="demo image.png">
        <?php
    } else {
        print "ERROR";
    }
?>