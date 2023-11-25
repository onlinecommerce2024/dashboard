<?php


class tabla{

    public $sql;
    public $resultados_por_pagina;


    public function view(){
        $resultados_por_pagina = 10;

        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $offset = ($pagina_actual - 1) * $resultados_por_pagina;

        $sql = "SELECT * FROM usuarios LIMIT $resultados_por_pagina OFFSET $offset";
        return $sql;
    }


    public function buscar(){

        $resultados_por_pagina = 10;

        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $offset = ($pagina_actual - 1) * $resultados_por_pagina;
        $buscar = $_POST['buscar'];
        $sql = "SELECT * FROM usuarios WHERE first_name LIKE '%{$buscar}%' or last_name LIKE '%{$buscar}%' or email LIKE '%{$buscar}%' or phone_number LIKE '%{$buscar}%' LIMIT $resultados_por_pagina OFFSET $offset";
        return $sql;

    }


    public function dato($dato){

    }

    public function total_registros($sql){

        $sql = preg_replace('/\sLIMIT.*$/i', '', $sql);
        return $sql;

    }


}


?>