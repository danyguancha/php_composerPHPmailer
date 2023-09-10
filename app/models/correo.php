<?php 
    namespace App\Models;
    use Exception;
    class Correo{
        private $nombre;
        private $altura;
        private $emailOrigen;
        private $emailDestino;
     

        private $peso;

        public function __construct(string $nombre, int $peso, float $altura ,string $emailOrigen, string $emailDestino){
            $this->nombre = $nombre;
            $this->altura = $altura;
            $this->peso = $peso;
            $this->emailOrigen = $emailOrigen;
            $this->emailDestino = $emailDestino;
        }

        function obtenerEmailOrigen():string{
            return $this->emailOrigen;
        }

        function obtenerEmailDestino():string{
            return $this->emailDestino;
        }

        function obtenerNombre():string{
            return $this->nombre;
        }
        
        function obteneraltura():int{
            return $this->altura;
        }  
        
        function obtenerpeso():int{
            return $this->peso*10000;
        }

        public function obtenerIMC(): float {
            if ($this->altura <= 0) {
                throw new Exception("La altura debe ser mayor que cero.");
            }
            return round($this->peso*10000 / ($this->altura * $this->altura),1);
        }




    }
?>