<?php

namespace App\Tools;

use PDO;
use PDOException;

class Database extends PDO
{

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
    }

    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        try{
            $sth = $this->prepare($sql);
            foreach ($array as $key => $value) {
                $sth->bindValue("$key", $value);
            }
            //echo $sth->queryString;
            $sth->execute();
            $response = $sth->fetchAll($fetchMode);
        }catch (PDOException $e){
            $response = "Exception found: ".  $e->getMessage(). "\n". "FILE :".$e->getFile()."\n"."LINE :".$e->getLine()."\n";
        }catch (\Throwable $e){
            $response = "Exception found: ".  $e->getMessage(). "\n". "FILE :".$e->getFile()."\n"."LINE :".$e->getLine()."\n";
        }
        return $response;

    }

    public function insert($table, $data)
    {
        try{
            ksort($data);
            $fieldNames = implode('`, `', array_keys($data));
            $fieldValues = ':' . implode(', :', array_keys($data));
            $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            //  echo $sth->queryString;
            $sth->execute();
            $response=$this->lastInsertId();
        }catch (PDOException $e){
            $response = "Exception found: ".  $e->getMessage(). "\n". "FILE :".$e->getFile()."\n"."LINE :".$e->getLine()."\n";
        }catch (\Throwable $e){
            $response = "Exception found: ".  $e->getMessage(). "\n". "FILE :".$e->getFile()."\n"."LINE :".$e->getLine()."\n";
        }
        return $response;

    }

}