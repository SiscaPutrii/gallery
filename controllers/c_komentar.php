<?php

include_once "c_conn.php";

class c_komentar
{
    public function insert_komentar($KomentarID, $FotoID, $UserID, $IsiKomentar, $Tanggal) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "INSERT INTO komentarfoto VALUES ('$KomentarID', '$FotoID', '$UserID', '$IsiKomentar', '$Tanggal')");
    }

    public function read_komentar($foto)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT komentarfoto.*, user.* FROM komentarfoto INNER JOIN user ON komentarfoto.UserID = user.UserID WHERE FotoID = $foto");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }

    public function jumlah($foto) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM komentarfoto WHERE FotoID = $foto");
        $data = mysqli_num_rows($query);
        return $data;
    }

    public function delete($id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM komentarfoto WHERE KomentarID = $id");
    }
}
