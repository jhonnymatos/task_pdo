<?php

namespace App\persistence;

use App\SystemServices\MonologFactory;

class ConnectionFactory{

static $dbuser='bn_moodle';
static $dbhost='172.18.0.2';
static $dbname='bitnami_moodle';
static $password="";
static $pdo;

    static function getConnectionInstance(){

    try{

    self::$pdo = new \PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname, self:: $dbuser, self:: $password);
    self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    MonologFactory::getInstance()->info("Conexão obtida com sucesso");
    }catch(\PDOException $ex){
        MonologFactory::getInstance()->info("Falha ao obter a conexão");
        MonologFactory::getInstance()->info($ex->getMessage());
    }

    return self::$pdo;
}
    
}