<?php
require_once 'classes/pokemon.php';
require_once 'classes/batalha.php';
require_once 'classes/ataque.php';

// Definir ataques
$ataquesPikachu = [
    new Ataque("Choque do Trovão", 40, "Elétrico", 90),
    new Ataque("Investida", 30, "Normal", 100),
    new Ataque("Trovão", 120, "Elétrico", 70),
    new Ataque("Chicote de Cauda", 40, "Normal", 100)
];
$ataquesCharmander = [
    new Ataque("Arranhão", 20, "Normal", 100),
    new Ataque("Ember", 40, "Fogo", 100),
    new Ataque("Lança-chamas", 95, "Fogo", 100),
    new Ataque("Fire Spin", (15 * 2), "Fogo", 100)
];

// Inicializar Pokémon
$pokemon1 = null;
$pokemon2 = new Pokemon("Charmander", "Fogo", 90, 30, 25, $ataquesCharmander);

// Se a requisição for POST, processa o Pokémon escolhido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pokemonEscolhido = $_POST['pokemon'];

    // Instancia o Pokémon escolhido
    if ($pokemonEscolhido === 'Pikachu') {
        $pokemon1 = new Pokemon("Pikachu", "Elétrico", 100, 40, 20, $ataquesPikachu);
    } else {
        $pokemon1 = new Pokemon("Charmander", "Fogo", 90, 30, 25, $ataquesCharmander);
    }

    $batalha = new Batalha($pokemon1, $pokemon2);

    // Se um ataque foi enviado, processa o turno
    if (isset($_POST['ataque'])) {
        $ataqueEscolhido = $_POST['ataque'];
        $resultado = $batalha->jogarTurno($ataqueEscolhido);
        echo json_encode($resultado);
    } else {
        // Retorna o estado inicial da batalha (HPs dos Pokémon)
        echo json_encode([
            'pokemon1_hp' => $pokemon1->hp,
            'pokemon2_hp' => $pokemon2->hp
        ]);
    }
}
