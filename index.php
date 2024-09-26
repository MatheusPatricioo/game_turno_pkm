<?php
require_once 'classes/pokemon.php';
require_once 'classes/batalha.php';
require_once 'classes/ataque.php';



// Simulação de batalha Pokémon
$nome_treinador = "Treinador"; // Pode alterar isso para pegar o nome de um formulário mais tarde

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

// Criar Pokémon
$pokemon1 = new Pokemon("Pikachu", "Elétrico", 100, 40, 20, $ataquesPikachu);
$pokemon2 = new Pokemon("Charmander", "Fogo", 90, 30, 25, $ataquesCharmander);

// HTML para a interface da batalha
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalha Pokémon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="battle-container">
        <!-- Pokémon do jogador -->
        <div class="pokemon-player">
            <img id="player-sprite" src="img/pikachu.png" alt="Pikachu">
            <div class="pokemon-info">
                <h2 id="player-name"><?php echo $pokemon1->getName(); ?></h2>
                <p>HP: <span id="player-hp"><?php echo $pokemon1->getHp(); ?></span></p>
            </div>
        </div>

        <!-- Pokémon oponente -->
        <div class="pokemon-opponent">
            <img id="opponent-sprite" src="img/charmander.png" alt="Charmander">
            <div class="pokemon-info">
                <h2 id="opponent-name"><?php echo $pokemon2->getName(); ?></h2>
                <p>HP: <span id="opponent-hp"><?php echo $pokemon2->getHp(); ?></span></p>
            </div>
        </div>

        <!-- Ataques -->
        <div class="attack-options">
            <?php
            foreach ($pokemon1->ataques as $index => $ataque) {
                echo "<button class='attack-btn' id='attack$index'>" . $ataque->nome . "</button>";
            }
            ?>
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>
