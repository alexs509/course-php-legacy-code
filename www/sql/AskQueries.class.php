<?php

namespace Project\SQL;

class AskQueries
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
     * @param array $where  the where clause
     * @param bool  $object if it will return an array of results ou an object
     *
     * @return mixed
     */
    public function getOneBy(array $where, $object = false): array
    {
        $sqlWhere = [];
        foreach ($where as $key => $value) {
            $sqlWhere[] = $key.'=:'.$key;
        }
        $sql = ' SELECT * FROM '.$this->table.' WHERE  '.implode(' AND ', $sqlWhere).';';
        $query = $this->pdo->prepare($sql);

        if ($object) {
            $query->setFetchMode(PDO::FETCH_INTO, $this);
        } else {
            $query->setFetchMode(PDO::FETCH_ASSOC);
        }
        $query->execute($where);
        return $query->fetch();
    }


    public function save(): void
    {
        $dataObject = get_object_vars($this);
        $dataChild = array_diff_key($dataObject, get_class_vars(get_class()));

        if (is_null($dataChild['id'])) {
            $sql = 'INSERT INTO '.$this->table.' ( '.
                implode(',', array_keys($dataChild)).') VALUES ( :'.
                implode(',:', array_keys($dataChild)).')';
        } else {
            $sqlUpdate = [];
            foreach ($dataChild as $key => $value) {
                if ('id' != $key) {
                    $sqlUpdate[] = $key.'=:'.$key;
                }
            }
            $sql = 'UPDATE '.$this->table.' SET '.implode(',', $sqlUpdate).' WHERE id=:id';
        }
        $query = $this->pdo->prepare($sql);
        $query->execute($dataChild);
    }
}