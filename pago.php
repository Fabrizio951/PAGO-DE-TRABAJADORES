<?php
class pago {
    // Atributos de clase
    private $fecha;
    private $trabajador;
    private $categoria;
    private $horas;

    // Método constructor
    public function __construct($fecha, $trabajador, $categoria, $horas) {
        $this->fecha = $fecha;
        $this->trabajador = $trabajador;
        $this->categoria = $categoria;
        $this->horas = $horas;
    }

    // Métodos GET
    public function getFecha() {
        return $this->fecha;
    }
    public function getTrabajador() {
        return $this->trabajador;
    }
    public function getCategoria() {
        return $this->categoria;
    }
    public function getHoras() {
        return $this->horas;
    }
    // Métodos SET
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setTrabajador($trabajador) {
        $this->trabajador = $trabajador;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setHoras($horas) {
        $this->horas = $horas;
    }
    //Metodos propios
    public function determinaCostoHora(){
        if ($this->categoria=='Operario')
            return 10;
            elseif ($this->categoria=='Administrativo')
            return 20;
            elseif ($this->categoria=='Jefe')
            return 40;
            else
            return 0;
    }
    public function calculaSubtotal(){
        return $this->determinaCostoHora()*$this->horas;
    }
    public function calculaDescuento(){
        if ($this->calculaSubtotal()<1000)
            return 0.075*$this->calculaSubtotal();
          elseif ($this->calculaSubtotal()<=2000)
            return 0.14*$this->calculaSubtotal();
          elseif ($this->calculaSubtotal()>2000)
            return 0.20*$this->calculaSubtotal();
          else
            return 0;

    }
    public function calculaNeto(){
        return $this->calculaSubtotal()-$this->calculaDescuento();
    }
}
?>
