<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class TestModel extends Model
{
    public function getMysql()
    {
        $db = Database::connect();

        $query = $db->query("SELECT * FROM test");

        return $query->getResultArray();
    }

    public function getPostgres()
    {
        $db = Database::connect('postgres');

        $query = $db->query("SELECT * FROM test");

        return $query->getResultArray();
    }

    public function getSqlite()
    {
        $db = Database::connect('sqlite');

        $query = $db->query("SELECT * FROM test");

        return $query->getResultArray();
    }
}