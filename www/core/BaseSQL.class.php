<?php

namespace Project\Core;

class BaseSQL
{
    private $pdo;
    private $table;

    /**
     * BaseSQL constructor.
     */
    public function __construct()
    {
        try {
            $this->pdo = new \PDO(DBDRIVER.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPWD);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur SQL : '.$e->getMessage());
        }
        $this->table = get_called_class();
    }

    /**
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
        $this->getOneBy(['id' => $id], true);
    }

}
