<?php


class crud{

    public static function connect()
    {
        try{
            $con = new PDO('mysql:localhost=localhost;dbname=projects_php', 'root' , '');
            // echo "true connection";

            return $con;

        }catch(PDOException $erro1){
            echo 'the error ' . $erro1->getMessage();

        }
    }
    public static function selectData()
    {
        $data=array();
        $con = crud::connect()->prepare("SELECT * FROM registeration");
        $con->execute();
        $data= $con->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }


}
?>