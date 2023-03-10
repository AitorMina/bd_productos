<?php

class Db
{
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO(DSN, USER, PASS);
        } catch (PDOException $exception) {
            die("No se ha podido conectar" . $exception->getMessage());
        }

    }
    public function valida_usuario($nombre,$pass){

        $consulta= "select * from usuarios where nombre= ? and pass= ? ";

        $rtdo = $this->ejecuta_consulta($consulta,[$nombre,$pass]);

      /*  $rtdo = $this->conexion->prepare($consulta);
        $rtdo ->bindParam(":nombre", $nombre);
        $rtdo ->bindParam(":pass", $pass);
        $rtdo ->execute();*/

      /*  $consulta= "select * from usuarios where nombre='$nombre' and pass='$pass' ";
        $rtdo = $this->conexion->query($consulta);
*/
        if ($rtdo->rowCount() > 0)
            return true;
        else
            return false;
    }
private function ejecuta_consulta(string $sentencia,array $valores=[]) : PDOStatement{
        $rtdo =$this->conexion->prepare($sentencia);
        $rtdo->execute($valores);
        return $rtdo;

}
public function obtener_familias():array{
        $sentencia="select * from familia";
        $rtdo = $this->ejecuta_consulta($sentencia);
        $filas =[];
        while ($fila = $rtdo->fetch(PDO::FETCH_ASSOC)){
            $filas[]=$fila;
        }
        return $filas;

}


    public function obtener_productos($familia):array
    {
        $sentencia = "select * from producto where familia=?";
        $rtdo = $this->ejecuta_consulta($sentencia, [$familia]);
        $filas = [];
        while ($fila = $rtdo->fetch(PDO::FETCH_ASSOC)) {
            $filas[] = $fila;
        }
        return $filas;


    }


}