<!DOCTYPE html>
<html class="no-js">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>PONDS</title>
    <link rel="icon" type="image/png" href="assets/images/logo_ponds.png">
    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-paso1.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="assets/js/lobibox.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/component.css" />
    <link rel="stylesheet" href="assets/css/Lobibox.min.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>   

    <base target="content-frame"> 
    
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script> 

    <script language="JavaScript" type="text/javascript">  

        Lobibox.base.DEFAULTS = $.extend({}, Lobibox.base.DEFAULTS, {
            iconSource: 'fontAwesome'
        });
        Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
            iconSource: 'fontAwesome'
        });    
        
alert(cordova.file.dataDirectory);   
        //alert ("window.innerHeight :" + window.innerHeight + "     window.innerWidth :"+window.innerWidth);
        /*if(window.innerHeight > window.innerWidth)
        {
            alert ("Por favor gira y usa la Tableta en forma Horizontal");
        }
    
        window.onresize = function (event) {
          applyOrientation();
        }
        
        function applyOrientation() {
          //alert ("window.innerHeight :" + window.innerHeight + "     window.innerWidth :"+window.innerWidth);
          if (window.innerHeight > window.innerWidth) 
          {
                if ( (parseInt(document.d.d22.value)-parseInt(document.d.d11.value)) > 3 )
                {
                    document.d.d11.value=document.d.d22.value;
                    alert ("Por favor gira y usa la Tableta en forma Horizontal");
                }
          }
        }
        */
    
    </script>

</head>


	<header>
		<img id="imagen_background" src="assets/images/background_01.jpg" class="img-responsive" width="1280" height="300"> 
    </header>
    
    <!-- esto es para saber el tiempo en la pagina  -->
    <form id="d" name="d">
      <input type="hidden" id="d11" name="d11" size="8" value="0" />
      <input type="hidden" id="d22" name="d22" size="8" />
    </form>    

    <div class="main-content">

        <div id="paso_1">

                <div id="bt_seguir" class="seguir">
                    <img src="assets/images/seguir.png" class="img-responsive" id="bt_siguiente_paso1">
                </div>
        
                <form class="form-basic" method="post" action="#" id="form_ponds_paso1" name="form_ponds_paso1">
                    <div class="form-row">
                        <label>
                            <span>Madre</span>
                            <input type="checkbox" id="form_madre" name="form_madre">
                        </label>
                    </div>            
        
                    <div class="form-row">
                        <label>
                            <span>Edad</span>
                            <input type="text" id="form_edad" name="form_edad" onkeypress="solo_numeros()" size="2" style="width: 50px;" maxlength="2" autocomplete="off">
                        </label>
                    </div>
        
                    <div class="form-row">
                        <label>
                            <span>Nombres</span>
                            <input type="text" id="form_nombres" name="form_nombres" onkeypress="solo_letras()"  maxlength="12" style="width: 250px;" autocomplete="off">
                        </label>
                    </div>
        
                    <div class="form-row">
                        <label>
                            <span>Apellidos</span>
                            <input type="text" id="form_apellidos" name="form_apellidos" onkeypress="solo_letras()" maxlength="12" style="width: 250px;" autocomplete="off">
                        </label>
                    </div>
        
                    <div class="form-row">
                        <label>
                            <span>Tel&eacute;fono</span>
                            <input type="text" id="form_telefono" name="form_telefono" onkeypress="solo_numeros()" maxlength="10" style="width: 250px;" autocomplete="off">
                        </label>
                    </div>

                </form>
                
        </div> <!-- FIN paso1 -->    
        
        
        <div id="paso_3"  style="display:none">
                <div id="bt_seguir" class="seguir">
                    <img src="assets/images/seguir.png" class="img-responsive" id="bt_siguiente_paso3">
                </div>
        
                <form class="form-basic" method="post" action="#" id="form_ponds_paso3" name="form_ponds_paso3">
        
                    <div class="form-row">
                        <label>
                            <span>&#191; C&oacute;mo te definir&iacute;as ?</span>
                            <textarea name="form_como_te_defines" id="form_como_te_defines" maxlength="32" onkeypress="solo_letras_respuesta()" autocomplete="off" >Soy </textarea>
                        </label>
                    </div>
                    <br />
        
                </form>        

                <div id="bt_regresar">
                    <img src="assets/images/regresar.png" class="img-responsive" id="bt_regresar3" style=" margin-top: -60px; margin-left: 1%;">
                </div>                 
                
        </div> <!-- FIN paso3 -->              
        
        
        <div id="paso_2"  style="display:none">

            
                    <div id="vistaprevia" class="rotate90" style="margin-top: -130px; margin-left: 20%;">
                        <img alt="" src="assets/images/foto_ejemplo.jpg" id="show-picture">
                    </div>

                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div style="margin-top: -185px; margin-left: 45%;">
                            <input type="file" name="fileToUpload" id="fileToUpload"  accept="image/*" class="inputfile inputfile-4" style="outline:0">
                            <label id="nombre_file" for="fileToUpload" style="outline:0"> <img src="assets/images/camara.png" width="70" height="70" style="outline:0"/> <span>Selecciona una Foto&hellip;</span></label>
                        </div>
                        <div   style="margin-botton: 150px; margin-left: 46%;">
                            <img src="assets/images/upload.png" class="img-responsive" id="bt_upload"  width="70" height="70"  style="outline:0"/><span style="color: #d3394c; font-size: 12px;"><strong>Carga la Foto</strong></span>
                        </div>
                       
                    </form>                              
                            
                    <div id="bt_seguir" class="seguir">
                        <img src="assets/images/fin.png" class="img-responsive" id="bt_siguiente_paso2" style=" margin-top: -48px; margin-left: 0%;">
                    </div>
                    

                <div id="bt_regresar">
                    <img src="assets/images/regresar.png" class="img-responsive" id="bt_regresar2" style=" margin-top: -52px; margin-left: 1%;">
                </div>                             
        
        </div> <!-- FIN paso2 -->    
        

                
        
    </div> <!-- FIN main-content -->
    
    
    <script src="assets/js/base.js"></script>
    <script src="assets/js/custom-file-input.js"></script>
    
</body>

<script language="JavaScript" type="text/javascript">  
    
    var milisec=0;
    var seconds=0;
    document.d.d22.value='0';
    function display()
    {
        if (milisec>=9)
        {
            milisec=0;
            seconds+=1;
        }
        else
            milisec+=1;
        document.d.d22.value=seconds+"."+milisec;
        setTimeout("display()",100);
    }
    display();    
    
    
    var angle = 90;

    function solo_letras() 
    {
        if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        {
            event.returnValue = false;    
        }
    }   
    
    function solo_numeros() 
    {
        var code = (event.keyCode ? event.keyCode : event.which);
        if ((code < 48) || (code > 57))
        {
            event.returnValue = false;    
        }     
    }     
    
    $("#bt_siguiente_paso1").click(function() {

        $("#paso_1").hide();
        $("#paso_3").show(); 
        var image = document.getElementById('imagen_background');
        image.src = "assets/images/background_03.jpg";     
        
    });         


    $("#bt_siguiente_paso2").click(function() {

        $("#paso_2").hide();

        // RESETEAR TODO DE NUEVO PARA UN SIGUIENTE
        $("#paso_1").show(); 
        var image = document.getElementById('imagen_background');
        image.src = "assets/images/background_01.jpg";     
        
        var frm = document.getElementById("form_ponds_paso1");
        document.getElementById("form_madre").checked = false;
        frm.form_edad.value = "";
        frm.form_nombres.value = "";
        frm.form_apellidos.value = "";
        frm.form_telefono.value = "";     

        var frm = document.getElementById("form_ponds_paso3");
        frm.form_como_te_defines.value = "Soy ";  

        var image_foto = document.getElementById('show-picture'); // la imagen
        image_foto.src="assets/images/foto_ejemplo.jpg";        
        
        img = document.getElementById('vistaprevia'); // el div
        var angle = 90;
        img.className = "rotate90";    
        
    }); 
    
    

    $("#bt_upload").click(function() {
        
            var image_preview = document.getElementById('show-picture');
            
            var frm = document.getElementById("form_ponds_paso1");
            form_edad       = frm.form_edad.value;
            form_nombres    = frm.form_nombres.value;
            form_apellidos  = frm.form_apellidos.value;
            form_telefono   = frm.form_telefono.value;     
            var es_madre    = "NO";
            form_madre = document.getElementById("form_madre");
            if( form_madre.checked ) 
            { es_madre    = "SI";  }
    
            var frm = document.getElementById("form_ponds_paso3");
            form_como_te_defines = frm.form_como_te_defines.value;              
            
            var data = new FormData();
            data.append( 'fileToUpload', $('#fileToUpload')[0].files[0] ); //photo is the name and id of the <input type="file">
            data.append( 'form_nombre_completo', form_nombres+' '+form_apellidos);
            data.append( 'form_edad', form_edad); 
            data.append( 'form_como_te_defines', form_como_te_defines);         
            data.append( 'form_telefono', form_telefono);
            data.append( 'form_madre', es_madre);
        
            $.ajax({
                    url:   'upload.php',
                    type:  'POST',
                    processData: false,
                    contentType: false,
                    cache:false,
                    data: data,
                    success: function(data){
                        image_preview.src = data;
                    }                    
            });   
    
    });     
    
    
    $("#bt_regresar2").click(function() {

        $("#paso_2").hide();
        $("#paso_3").show(); 

        var image = document.getElementById('imagen_background');
        image.src = "assets/images/background_03.jpg";     

    });   
    
    
    $("#bt_regresar3").click(function() {

        $("#paso_3").hide();
        $("#paso_1").show(); 

        var image = document.getElementById('imagen_background');
        image.src = "assets/images/background_01.jpg";     

    });       


    $("#bt_siguiente_paso3").click(function() {
        
        $("#paso_3").hide();
        $("#paso_2").show(); 
        var image = document.getElementById('imagen_background');
        image.src = "assets/images/background_02.jpg";          
        
    }); 

$("#bt_girar").click(function() {    
    navigator.camera.getPicture(onSuccess, onFail, { quality: 50, 
    destinationType: Camera.DestinationType.FILE_URI }); 
});

function onSuccess(imageURI) {
    var image = document.getElementById('show-picture');
    image.src = imageURI;
}

function onFail(message) {
    alert('Failed because: ' + message);
}


    function volver_full()
    {
        var viewFullScreen = document.getElementById("view-fullscreen");
            var docElm = document.documentElement;
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            }
            else if (docElm.msRequestFullscreen) {
                docElm.msRequestFullscreen();
            }
            else if (docElm.mozRequestFullScreen) {
                docElm.mozRequestFullScreen();
            }
            else if (docElm.webkitRequestFullScreen) {
                docElm.webkitRequestFullScreen();
            }         
    }

</script>

</html>
