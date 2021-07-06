<?php

use\Psr\Http\Message\ServerRequestInterface as Request;
use\Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;


$app->get('/hello/{name}',function(Request $request, Response $response, array $args){

$name=$args['name'];
$response->getBody()->write("hello,$name");
return $response;
});



$app->get('/users',function(Request $request, Response $response, array $args){
    
    // $sql= "SELECT *FROM users
    // INNER JOIN address ON users.id=address.id";

    $sql= "SELECT *FROM users";

    try{
        $db = new db();
        $db = $db->connectionDB();
        $result = $db->query($sql);
            if( $result->rowCount() > 0 ) {
                $users =$result->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($users);
            }else
                { echo "0 users";}

        $result = null;
        $db     = null;

    }catch(PDOException $e){
         echo '{"error" :{"text":'.$e.getMessage().'}';
          
    }
    
    //$response->getBody()->write();
   // return $response;
    });




