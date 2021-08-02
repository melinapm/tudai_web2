<?php

Class VeterinariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=fufuland;charset=utf8', 'root', 'root');
    }


    // Busco todos los veterinarios y donde trabajan
	public function GetVeterinarios(){
        $query =  $this->db->prepare('SELECT vet.nombre, vet.apellido, vet.especialidad, vetes.nombre veterinaria                                        
                                         FROM veterinarios vet JOIN veterinarias vetes ON vet.veterinaria=vetes.id');
        $query->execute();
        $veterinarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $veterinarios;
    }	
}
?>