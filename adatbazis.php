<?php 
class Adatbazis {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "autodb");
        if ($this->conn->connect_errno) {
            die("Sikertelen kapcsolódás az adatbázishoz: ".$this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }

    public function list_autok()
    {
        $sql = "SELECT * FROM autok";
        $result = $this->conn->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function auto_felvetel($rendszam, $marka, $modell, $gyartas_eve, $uzemanyag_tipus)
    {
        $sql = "INSERT INTO `autok`(`rendszam`, `marka`, `modell`, `gyartas_eve`, `uzemanyag_tipus`) 
        VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssis",$rendszam, $marka, $modell, $gyartas_eve, $uzemanyag_tipus);
        $stmt->execute();
    }
}


?>