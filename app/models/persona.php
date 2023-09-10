<?php 
    namespace App\Models;
    use Exception;
    class Persona{
        private $nombre;
        private $altura;

        private $peso;

        public function __construct(string $nombre, int $peso,float $altura){
            $this->nombre = $nombre;
            $this->peso = $peso;
            $this->altura = $altura;
        }

        function obtenerNombre():string{
            return $this->nombre;
        }

        function obteneraltura():int{
            return $this->altura;
        }  
        
        function obtenerpeso():int{
            return $this->peso *10000;
        }

       
    }
?>