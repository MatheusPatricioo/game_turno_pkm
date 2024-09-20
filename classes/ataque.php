<?php
class Ataque
{
    public $nome;
    public $dano;
    public $tipo;
    public $precisao;

    public function __construct($nome, $dano, $tipo, $precisao)
    {
        $this->nome = $nome;
        $this->dano = $dano;
        $this->tipo = $tipo;
        $this->precisao = $precisao;
    }

    public function calcularDano()
    {
        // Simulação de precisão (se a precisão for 100%, o ataque sempre acerta)
        $chance = rand(1, 100);
        if ($chance <= $this->precisao) {
            return $this->dano;
        } else {
            echo "{$this->nome} errou!\n";
            return 0; // Ataque falhou
        }
    }
}
