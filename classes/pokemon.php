<?php
class Pokemon
{
    public $name;
    public $type;
    public $hp;
    public $attack;
    public $defense;
    public $ataques = []; // Lista de ataques disponíveis

    public function __construct($name, $type, $hp, $attack, $defense, $ataques)
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->ataques = $ataques; // Atribuir a lista de ataques
    }

    // Getters
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

    // Setters
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

    // Função para o Pokémon levar dano
    public function levarDano(int $dano)
    {
        $this->hp -= $dano;
        if ($this->hp < 0) {
            $this->hp = 0; // Certificar que o HP não fica negativo
        }
    }

    // Verifica se o Pokémon está vivo
    public function estaVivo(): bool
    {
        return $this->hp > 0;
    }

    // Função para escolher um ataque do Pokémon
    public function escolherAtaque()
    {
        echo "Escolha um ataque para {$this->name}:\n";
        
        // Exibir a lista de ataques disponíveis
        foreach ($this->ataques as $index => $ataque) {
            echo ($index + 1) . ". " . $ataque->nome . "\n";
        }

        // Verificar escolha válida
        $escolha = null;
        while (is_null($escolha) || $escolha < 0 || $escolha >= count($this->ataques)) {
            $escolha = intval(fgets(STDIN)) - 1;
            if ($escolha < 0 || $escolha >= count($this->ataques)) {
                echo "Escolha inválida, tente novamente.\n";
            }
        }

        return $this->ataques[$escolha]; // Retorna o ataque escolhido
    }

    // Novo método para buscar um ataque por índice
    public function getAtaque($indice)
    {
        if (isset($this->ataques[$indice])) {
            return $this->ataques[$indice];
        }
        return null; // Retorna null se o índice não for válido
    }
}
