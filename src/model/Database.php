<?php

namespace Database;

require_once "../config.php";

use Exception;
use PDO; //PHP Data Objects
use PDOException;

class Database {
    
   private $connection;

   private function connect()
   {
       $this->connection = new PDO(
           'mysql:'.
           'host='.MYSQL_SERVER.';'.
           'dbname='.MYSQL_DATABASE.';'.
           'charset='.MYSQL_CHARSET,
           MYSQL_USER,
           MYSQL_PASS,
           array(PDO::ATTR_PERSISTENT => true)
       );

       $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   }

   private function disconnect()
   {
       $this->connection = null;
   }

   //////////////////////////////////////////////////////////////////////////////
   public function select($sql, $parameters = null)
   {

        if(!preg_match('/^SELECT/i', $sql)){
            $erro = new Exception();
            echo "<u>SQL error (SELECT):</u><br>".$erro;
            die('*** Não é uma instrução SELECT ***');
        }

        $this->connect();

        $result = null;

        try {
            if(!empty($parameters)){
                $myExecute = $this->connection->prepare($sql);
                $myExecute->execute($parameters);
                $result = $myExecute->fetchAll(PDO::FETCH_CLASS);
            } else {
                $myExecute = $this->connection->prepare($sql);
                $myExecute->execute();
                $result = $myExecute->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $error) {
            var_dump($error);
            return false;
        }

        $this->disconnect();

        return $result;
   }

   //////////////////////////////////////////////////////////////////////////////
   public function insert($sql, $parameters = null)
   {

        if(!preg_match('/^INSERT/i', $sql)){
            $erro = new Exception();
            echo "<u>SQL error (INSERT):</u><br>".$erro;
            die('*** Não é uma instrução INSERT ***');
        }

        $this->connect();

        try {
            if(!empty($parameters)){
                $myExecute = $this->connection->prepare($sql);
                $result = $myExecute->execute($parameters);
            } else {
                $myExecute = $this->connection->prepare($sql);
                $result = $myExecute->execute();
            }
        } catch (PDOException $error) {
            var_dump($error);
            return false;
        }

        $this->disconnect();

        return $result;
   }

   //////////////////////////////////////////////////////////////////////////////
   public function update($sql, $parameters = null)
   {

        if(!preg_match('/^UPDATE/i', $sql)){
            $erro = new Exception();
            echo "<u>SQL error (UPDATE):</u><br>".$erro;
            die('*** Não é uma instrução UPDATE ***');
        }

        $this->connect();

        try {
            if(!empty($parameters)){
                $myExecute = $this->connection->prepare($sql);
                $result = $myExecute->execute($parameters);
            } else {
                $myExecute = $this->connection->prepare($sql);
                $result = $myExecute->execute();
            }
        } catch (PDOException $error) {
            var_dump($error);
            return false;
        }

        $this->disconnect();

        return $result;
   }

   //////////////////////////////////////////////////////////////////////////////
   public function delete($sql, $parameters = null)
   {

        if(!preg_match('/^DELETE/i', $sql)){
            $erro = new Exception();
            echo "<u>SQL error (DELETE):</u><br>".$erro;
            die('*** Não é uma instrução DELETE ***');
        }

        $this->connect();

        try {
            if(!empty($parameters)){
                $myExecute = $this->connection->prepare($sql);
                $result = $myExecute->execute($parameters);
            } else {
                $myExecute = $this->connection->prepare($sql);
                $result = $myExecute->execute();
            }
        } catch (PDOException $error) {
            var_dump($error);
            return false;
        }

        $this->disconnect();

        return $result;
   }
   
   ////////////////////////////////////////////////////****GENÉRICA****//////////
   public function statement($sql, $parameters = null)
   {

        if(preg_match('/^(SELECT|INSERT|UPDATE|DELETE)/i', $sql)){
            $erro = new Exception();
            echo "<u>SQL error: INSTRUÇÃO INVÁLIDA</u><br>".$erro;
            die('*** Não é uma instrução SQL ***');
        }

        $this->connect();

        try {
            if(!empty($parameters)){
                $myExecute = $this->connection->prepare($sql);
                $myExecute->execute($parameters);
            } else {
                $myExecute = $this->connection->prepare($sql);
                $myExecute->execute();
            }
        } catch (PDOException $error) {
            var_dump($error);
            return false;
        }

        $this->disconnect();
   }
}