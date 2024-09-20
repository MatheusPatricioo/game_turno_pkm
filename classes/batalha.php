<?php
class Batalha
{
    private $pokemon1;
    private $pokemon2;

    public function __construct(Pokemon $pokemon1, Pokemon $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function iniciarBatalha()
    {
        // Pergunta se o usuário quer batalhar
        echo "Você quer iniciar a batalha? (s/n): ";
        $resposta = trim(fgets(STDIN));

        if (strtolower($resposta) === 's') {

            while ($this->pokemon1->hp > 0 && $this->pokemon2->hp > 0) {
                echo "=======================\n";
                echo "{$this->pokemon1->name} HP: {$this->pokemon1->hp}\n";
                echo "{$this->pokemon2->name} HP: {$this->pokemon2->hp}\n";
                echo "=======================\n";

                // Escolher ataque do Pokémon 1 (usuário)
                $ataqueEscolhido = $this->pokemon1->escolherAtaque();
                echo "{$this->pokemon1->name} usa {$ataqueEscolhido->nome}!\n";
                sleep(1);

                // Cálculo de dano do Pokémon 1 para o Pokémon 2
                $dano = $ataqueEscolhido->calcularDano() - $this->pokemon2->defense;
                if ($dano < 0) {
                    $dano = 0; // Impede dano negativo
                }
                $this->pokemon2->hp -= $dano;

                echo "{$this->pokemon2->name} agora tem {$this->pokemon2->hp} de HP.\n";
                sleep(1);

                // Verificar se o Pokémon 2 ainda está vivo antes de atacar
                if ($this->pokemon2->hp > 0) {
                    // Escolha aleatória do ataque do Pokémon 2 (CPU)
                    $ataqueInimigo = $this->pokemon2->ataques[array_rand($this->pokemon2->ataques)];
                    echo "{$this->pokemon2->name} usa {$ataqueInimigo->nome}!\n";
                    sleep(1);

                    // Cálculo de dano do Pokémon 2 para o Pokémon 1
                    $danoInimigo = $ataqueInimigo->calcularDano() - $this->pokemon1->defense;
                    if ($danoInimigo < 0) {
                        $danoInimigo = 0; // Impede dano negativo
                    }
                    $this->pokemon1->hp -= $danoInimigo;

                    echo "{$this->pokemon1->name} agora tem {$this->pokemon1->hp} de HP.\n";
                    sleep(1);
                }
            }

            // Verifica quem venceu a batalha
            if ($this->pokemon1->hp <= 0) {
                echo "{$this->pokemon1->name} desmaiou! {$this->pokemon2->name} venceu a batalha!\n";
            } elseif ($this->pokemon2->hp <= 0) {
                echo "{$this->pokemon2->name} desmaiou! {$this->pokemon1->name} venceu a batalha!\n";
            }
        } else {

            echo "Você escolheu fugir como um covarde. Até a próxima!\n";
        }
    }
}
