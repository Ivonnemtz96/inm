<?php
date_default_timezone_set('America/Denver');   
$fecha = date("Y-m-d H:i:s");

function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

//GENERAR CODIGO ALEATORIO
function GeraHash($qtd){ 
$Caracteres = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$QuantidadeCaracteres = strlen($Caracteres); 
$QuantidadeCaracteres--; 

$Hash=NULL; 
    for($x=1;$x<=$qtd;$x++){ 
        $Posicao = rand(0,$QuantidadeCaracteres); 
        $Hash .= substr($Caracteres,$Posicao,1); 
    } 

return $Hash; 
} 


if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if(($nombre=="")&($email=="")&($telefono=="")&($intro=="")&($descripcion=="")){
		header('location:?msg=vacio');
		exit;
	}else if($nombre==""){
		header('location:?msg=nombre');
		exit;
	}else if($intro==""){
		header('location:?msg=intro');
		exit;
	}else if($email==""){
		header('location:?msg=email');
		exit;
	} else if(!isEmail($email)) {
		header('location:?msg=noemail');
		exit;
	}else if($telefono==""){
		header('location:?msg=telefono');
		exit;
	}else if($descripcion==""){
		header('location:?msg=desc');
		exit;
	}else{

        $codigo = ($UserData['foto']); //SI NO SE SUBE LA FOTO LE DAMOS EL VALOR EXISTENTE A CODIGO
         
        if (!empty($_FILES['thumb']['tmp_name'])) {
            
            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO
            
            if($_FILES['thumb']['type'] !== 'image/jpeg'){ 
		      header('location:?msg=fnv');
		      exit;
            } else
            
            if(($_FILES['thumb']['size']) > 1000000){ 
		      header('location:?msg=fnvz');
		      exit;
            }
            
            if (isset ($UserData['foto'])){
                $archivo = '../upload/user/'.($UserData['foto']).'.jpg';
                unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
            }
            
                $codigo = GeraHash(10); //LO USAMOS PARA EL NUEVO NOMBRE A LA FOTO
	            $archivo_subido = '../upload/user/' . $codigo . '.jpg';
	            move_uploaded_file($thumb, $archivo_subido);
         }
        
		
        if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
            extract($_REQUEST);
			$data	=	array(
							'nombre'=>$nombre,
                            'email'=>$email,
                            'telefono'=>$telefono,
                            'fa'=>$fecha,
                            'intro'=>$intro,
                            'descripcion'=>$descripcion,
                            'foto'=>$codigo, //GUARDAMOS EL NOMBRE DE LA FOTO
                            
						);
	       $update	=	$db->update('usuarios',$data,array('id'=>($UserData['id'])));
    
            if($update){
                header('location:?msg=rus'); //Exito en el cmabio
                exit;}
            else{
                header('location:?msg=ups'); //sin cambios
                exit;
            }
        }
    }
}
