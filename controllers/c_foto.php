<?php

include_once "c_conn.php";

class c_foto
{
    public function insert($id, $iduser, $date, $judul, $desc, $dalbum, $poto)
    {
        $conn = new c_conn();
        $query = "INSERT INTO foto VALUES ('$id', '$judul', '$desc', '$date', '$poto', '$dalbum' ,'$iduser')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function delete_foto($id)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM foto WHERE FotoID = $id");
    }

    public function read($dalbum)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE AlbumID = $dalbum");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }

    public function edit($fotoid)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE FotoID = $fotoid");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($FotoID, $JudulFoto, $DeskripsiFoto)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto' WHERE FotoID = $FotoID");
    }

    public function dashboard()
    {
        $conn = new c_conn();
        $query = "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.UserID = user.UserID ORDER BY FotoID DESC";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function select($FotoID)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.UserID = user.UserID WHERE FotoID = $FotoID");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
