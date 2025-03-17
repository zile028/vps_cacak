<?php

namespace Core;

use PDO;

class Database
{
    public $pdo;
    private $statment;
    private bool $executeResult;

    public function __construct($config, $username = "root", $password = "")
    {
        $dsn = "mysql:" . http_build_query($config, "", ";");
        try {
            $this->pdo = new PDO($dsn, $config["username"], $config["password"], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Set error mode to exception
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function query($query, $params = [], $type = [])
    {

        $this->statment = $this->pdo->prepare($query);
        if (isset($params["_method"])) {
            unset($params["_method"]);
        }
        if (count($type) === count($params)) {
            $index = 0;
            foreach ($params as $key => $value) {
                $this->statment->bindValue(":" . $key, $value, $type[$index]);
                $index++;
            }
            $this->executeResult = $this->statment->execute();
        } else {
            $this->executeResult = $this->statment->execute($params);
        }
        return $this;

    }

    public function beginTransaction()
    {
        $this->pdo->beginTransaction();
    }

    public function commit()
    {
        $this->pdo->commit();
    }

    public function rollBack()
    {
        $this->pdo->rollBack();
    }

    public function closeCursor()
    {
        
    }

    public function find($fetchType = null)
    {
        return $this->statment->fetchAll($fetchType);
    }

    public function findOne($fetchType = null)
    {
        return $this->statment->fetch($fetchType);
    }

    public function count($fetchType = PDO::FETCH_COLUMN)
    {
        return $this->statment->fetch($fetchType);
    }

    public function findOneOrFail()
    {
        $result = $this->findOne();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function deleteOrFail()
    {
        $result = (bool)$this->statment->rowCount();
        if (!$this->executeResult) {
            abort(Response::SERVER_ERROR);
        } elseif (!$result) {
            abort(Response::FORBIDDEN);
        }

        return $result;
    }

    public function nextRowsetFind($fetchType = null)
    {
        $this->statment->nextRowset();
        return $this->statment->fetchAll($fetchType);
    }

    public function nextRowsetFindOne($fetchType = null)
    {
        $this->statment->nextRowset();
        return $this->statment->fetch($fetchType);
    }

    public function nextRowsetCount()
    {
        $this->statment->nextRowset();
        return $this->statment->fetch(PDO::FETCH_COLUMN);
    }

    public function nextRowset()
    {
        $this->statment->nextRowset();
        return $this;
    }

    public function isExecuteResult(): bool
    {
        return $this->executeResult;
    }

    public function lastID(): int
    {
        return $this->pdo->lastInsertId();

    }

    public function affectedRows()
    {
        return $this->statment->rowCount();
    }

    public function errorInfo()
    {
        return $this->statment->errorInfo();
    }


}
