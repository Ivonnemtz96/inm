<?php 

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

 try  
 {   
      $connect = new PDO("mysql:host=".SS_DB_HOST."; dbname=".SS_DB_NAME."", SS_DB_USER, SS_DB_PASSWORD);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {
               session_destroy();
               header("location: /admin.php?msg=all");
           }  
           else  
           {  
                $query = "SELECT * FROM usuarios WHERE email = :email AND pass = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     => $_POST["email"],  
                          'password'  => $_POST["password"],  
                     ) 
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     
                    //ESTABLECEMOS LA HORA IGUAL QUE EN LOS CABOS
                    date_default_timezone_set('America/Denver');   
                    $fecha = date("Y-m-d H:i:s");
                    //OBTENEMOS DATOS DE USUARIO
                    $UserData =	$db->getAllRecords('usuarios','*',' AND email="'.($_POST["email"]).'"LIMIT 1 ');
                    $UserData = $UserData[0];
                    $_SESSION["UserId"] = $UserData['id'];
                    //ACTUALIZAMOS LA FECHA DEL ÚLTIMO LOGIN
                    $InsertData	=	array(
                                    'fl'=> $fecha,
                                 );
                    $update	=	$db->update('usuarios',$InsertData,array('id'=>($UserData['id'])));//ACTUALIZAMOS LA CUOTA CONSUMIDA EN LA BASE DE DATOS
                                        
                    header("location: /admin/profile?msg=bienvenido");
                }  
                else  
                {  
                    session_destroy();
                    header("location: /admin?msg=inv");
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 