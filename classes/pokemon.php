<?php
class Pokemon
{
    public $name;
    public $type;
    public $hp;
    public $attack;
    public $defense;
    public $ataques = [];
    public function __construct($name, $type, $hp, $attack, $defense, $ataques)
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->ataques = $ataques; // Lista de ataques disponíveis
    }
    public function getName()
    {
        return $this->name;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getHp()
    {
        return $this->hp;
    }
    public function getAttack()
    {
        return $this->attack;
    }
    public function getDefense()
    {
        return $this->defense;
    }
    public function setName($newName)
    {
        $this->name = $newName;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function setHp($hp)
    {
        $this->hp = $hp;
    }
    public function setAttack($attack)
    {
        $this->attack = $attack;
    }
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }
    public function levarDano(int $dano)
    {
        $this->hp -= $dano;
    }
    public function estaVivo(): bool
    {
        return $this->hp > 0;
    }
    public function escolherAtaque()
    {
        echo "Escolha um ataque para {$this->name}:\n";
        foreach ($this->ataques as $index => $ataque) {
            echo ($index + 1) . ". " . $ataque->nome . "\n";
        }
        $escolha = intval(fgets(STDIN)) - 1;
        return $this->ataques[$escolha];
    }
}