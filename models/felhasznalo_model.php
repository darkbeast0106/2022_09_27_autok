<?php
class Felhasznalo_model
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "autodb");
        if ($this->conn->connect_errno) {
            die("Sikertelen kapcsolódás az adatbázishoz: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }

    public function regisztracio($felhasznalonev, $jelszo)
    {
        $sql = "INSERT INTO felhasznalo
            (felhasznalonev, jelszo)
            VALUES (?,?)";
        $stmt = $this->conn->prepare($sql);
        $hash = password_hash($jelszo, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $felhasznalonev, $hash);
        $stmt->execute();
    }

    public function bejelentkezes($felhasznalonev, $jelszo)
    {
        $sql = "SELECT * FROM felhasznalo 
            WHERE felhasznalonev = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $felhasznalonev);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return false;
        }
        $row = $result->fetch_assoc();
        if (password_verify($jelszo, $row['jelszo'])) {
            return [
                'id' => $row['id'],
                'felhasznalonev' => $row['felhasznalonev']
            ];
        } else {
            return false;
        }
    }
}
