<?php

class KijeloltFelhasznalo {
    
    private $id;
    protected $tablaNev;

    function __constructor($tablaNev){
        $this->tableNev = $tablaNev;
    }

    protected function set_user($id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT id FROM $this->tablaNev WHERE id = $id";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->id = $row['id'];
            }
            else{
                $sql = "INSERT INTO adminok ($id)";
                        if($result = $conn->query($sql)){
                            $this->id = $id;
                        }
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    protected function get_id() {
        return $this->id;
    }

    // id listáját adja vissza
    protected function adminokListaja($conn) {
        $lista = array();
        $sql = "SELECT id FROM $this->tablaNev";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['id'];
                }
            }
        }
        return $lista;
    }
}
?>