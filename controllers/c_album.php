<?php

include_once "c_conn.php";

class c_album
{
    public function tambah_album($id, $nama, $desc, $date, $userid)
    {
        $conn = new c_conn();
        $query = "INSERT INTO album VALUES ('$id', '$nama', '$desc', '$date', '$userid')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function read_album($id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM album WHERE UserID = $id");
        while($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }

    public function edit($albumid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM album WHERE AlbumID = $albumid");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function delete_album($id) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM album WHERE AlbumID = $id");

        header("Location: ../views/calbum.php");
    }

    public function update_album($id, $nama, $desc){
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "UPDATE album SET NamaAlbum='$nama', Deskripsi='$desc' WHERE AlbumID = $id");
    }

    public function jumlah_data($bebas) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE AlbumID = $bebas");
        $data = mysqli_num_rows($query);
        return $data;
    }

    public function foto($albumid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT LokasiFile FROM foto WHERE AlbumID = $albumid");
        $data = mysqli_fetch_assoc($query);
        return $data['LokasiFile'];
    }
}
