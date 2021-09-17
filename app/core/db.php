<?php 

namespace App\core;
use App\core\DbConfig;
use PDOException;
use PDO;

class Db
{

    protected PDO $dbh;

    public function __construct()
    {
        $config = DbConfig::getInstance();

        $this->dbh = new PDO('mysql:host='.$config->db['DBHOST'].';
            dbname='.$config->db['DBNAME'].'',
            $config->db['DBUSER'],
            $config->db['DBPASS']);
    }

    public function query(string $sql, $class = 'App\core\Model', $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $data = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function getIds($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $array = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $ids = [];
        foreach ($array as $k => $v) {
            foreach ($v as $key => $value) {
                $ids[] = $value;
            }
        }

        return $ids;
    }

    public function lastID()
    {
        $sql = 'SELECT MAX(`id`) FROM  users';
        $stmt = $this->dbh->query($sql);
        $row = $stmt->fetch();

        return $row[0];
    }

}
