<?php 

include_once "c_conn.php";

class c_like {
    public function like($id, $foto, $user, $date) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "INSERT INTO likefoto VALUES('$id', '$foto', '$user', '$date')");
    }

    public function user($foto, $id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM likefoto WHERE FotoID = $foto AND UserID = $id");
        $data = mysqli_num_rows($query);
        return $data;
    }

    public function jumlah($foto) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM likefoto WHERE FotoID = $foto");
        $data = mysqli_num_rows($query);
        return $data;
    }

    public function delete_like($id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM likefoto WHERE UserID = $id");
    }
}

?>