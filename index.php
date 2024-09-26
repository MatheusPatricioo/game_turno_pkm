<?php
require_once 'classes/pokemon.php';
require_once 'classes/batalha.php';
require_once 'classes/ataque.php';
$nome_treinador = fgets(STDIN);
$nome_treinador = trim($nome_treinador);
echo "Bem vindo à batalha pokemon, " . $nome_treinador . "!\n";
sleep(2);
system('cls');
// Definir ataques para os pokémons
$ataque1 = new Ataque("Choque do Trovão", 40, "Elétrico", 90);
$ataque2 = new Ataque("Investida", 30, "Normal", 100);
$ataque3 = new Ataque("Trovão", 120, "Elétrico", 70);
$ataque4 = new Ataque("Chicote de Cauda", 40, "Normal", 100);

$ataque5 = new Ataque("Arranhão", 20, "Normal", 100);
$ataque6 = new Ataque("Ember", 40, "Fogo", 100);
$ataque7 = new Ataque("Lança-chamas", 95, "Fogo", 100);
$ataque8 = new Ataque("Fire Spin", (15 * 2), "Fogo", 100);

$ataque9 = new Ataque("Jato D'água", 40, "Água", 100);
$ataque10 = new Ataque("Bolhas", 25, "Água", 95);
$ataque11 = new Ataque("Cabeçada", 50, "Normal", 85);
$ataque12 = new Ataque("Raio de Gelo", 80, "Gelo", 90);

$ataque13 = new Ataque("Leech seed", 35, "Grama", 95);
$ataque14 = new Ataque("Sleep Powder", 10, "Grama", 75);
$ataque15 = new Ataque("Cabeçada", 50, "Normal", 85);
$ataque16 = new Ataque("SolarBeam", 120, "Grass", 90);
// Criar os Pokémon
$pokemon1 = new Pokemon("Pikachu", "Elétrico", 100, 40, 20, [$ataque1, $ataque2, $ataque3, $ataque4]);
$pokemon2 = new Pokemon("Charmander", "Fogo", 90, 30, 25, [$ataque5, $ataque6, $ataque7, $ataque8]);
$pokemon3 = new Pokemon("Squirtle", "Água", 105, 35, 25, [$ataque9, $ataque10, $ataque11, $ataque12]);
$pokemon4 = new Pokemon("Bulbasaur", "Planta", 95, 38, 30, [$ataque13, $ataque14, $ataque15, $ataque16]);
$pokemons = [$pokemon1, $pokemon2, $pokemon3, $pokemon4];
// Perguntar ao jogador qual Pokémon ele quer escolher
echo "Novo comando: escolha seu Pokémon.\n";
echo "1. Charmander (Fogo)\n";
echo "2. Squirtle (Água)\n";
echo "3. Bulbasaur (Planta)\n";
echo "Digite o número do Pokémon que você quer escolher: ";
$escolha = trim(fgets(STDIN));
$pokemonJogador = $pokemons[$escolha];
sleep(1);
system('cls');
// Oponente
$pokemonInimigo = $pokemon1;
// Iniciar a batalha
$batalha = new Batalha($pokemonJogador, $pokemonInimigo);
$batalha->iniciarBatalha();
