<?php

class CrudProcess {
    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function login($username,$password, $role)
    {
        $row = $this->db->prepare("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' AND role = '$role'");
        $row->execute();
        $count = $row->rowCount();
        if($count > 0)
        {
            return $row->fetch(PDO::FETCH_OBJ);
        }else{
            return 'gagal';
        }
    }

    function register($name, $username, $password, $idOutlet, $role)
    {
        $row = $this->db->prepare("INSERT INTO tb_user (nama_user, username, password, id_outlet, role) VALUES('$name','$username','$password','$idOutlet','$role')");
        $result = $row->execute();
        if($result)
        {
            return $name;
        }else{
            return 'gagal';
        }
    }
    
    function getAllData($tabel)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel");
        $row->execute();
        return $row->fetchAll(PDO::FETCH_OBJ);
    }

    function getDataById($query)
    {
        $row = $this->db->prepare($query);
        $row->execute();
        return $row->fetchAll(PDO::FETCH_OBJ);
    }

    function getData($tabel,$where,$id)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
        $row->execute(array($id));
        return $row->fetch(PDO::FETCH_OBJ);
    }

    function selectJoin($query) {
        $row = $this->db->prepare($query);
        $row->execute();
        return $row->fetchAll(PDO::FETCH_OBJ);
    }

    function selectSingleJoin($query) {
        $row = $this->db->prepare($query);
        $row->execute();
        return $row->fetch(PDO::FETCH_OBJ);
    }

    function insert($query)
    {
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    function update($query)
    {
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    function delete($query)
    {
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
}
