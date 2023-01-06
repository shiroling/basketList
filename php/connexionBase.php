<?php
namespace App;
use PDO;

class connexionBase {

    private $db_name = "ETUPRE";
    private $db_user = "CTQ4266A";
    private $db_pass = "toor";
    private $db_host = "host=telline.univ-tlse3.fr";
    private $pdo;

    public function __construct()
    {
    }

    public function getDB()
    {
        $this->pdo = new PDO('oracle:dbname=ETUPRE;host=telline.univ-tlse3.fr', 'CTQ4266A', 'toor');
        return $this->pdo;
    }


    public function getDebugDB()
    {
        $PDO =  new PDO('oracle:dbname=ETUPRE;host=telline.univ-tlse3.fr', 'CTQ4266A', 'toor');
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $PDO;
        return $this->pdo;
    }

    public function query($statement)
    {
        $this->getDB()->query($statement);

    }
}
?>