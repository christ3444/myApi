<?php
class db{

    private $dbHost ='localhost';
    private $dbUser ='root';
    private $dbPass ='';
    private $dbName ='slim_db';

   
    public function connectionDB(){
        $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
        $dbConnection = new PDO($mysqlConnect,$this->dbUser,$this->dbPass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }



}