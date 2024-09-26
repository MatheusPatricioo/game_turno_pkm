// URL base da PokéAPI
const pokeApiUrl = 'https://pokeapi.co/api/v2/pokemon/';

// Função para buscar dados de um Pokémon
async function fetchPokemonData(pokemonName, isPlayer) {
    try {
        const response = await fetch(`${pokeApiUrl}${pokemonName}`);
        const data = await response.json();

        // Pegar dados do Pokémon
        const pokemonNameEl = isPlayer ? document.getElementById('player-name') : document.getElementById('opponent-name');
        const pokemonHpEl = isPlayer ? document.getElementById('player-hp') : document.getElementById('opponent-hp');
        const pokemonSpriteEl = isPlayer ? document.getElementById('player-sprite') : document.getElementById('opponent-sprite');

        // Preencher informações na tela
        pokemonNameEl.textContent = data.name.toUpperCase();
        pokemonHpEl.textContent = data.stats[0].base_stat; // HP
        pokemonSpriteEl.src = data.sprites.front_default; // Sprite do Pokémon

        // Preencher ataques (apenas para o jogador)
        if (isPlayer) {
            for (let i = 0; i < 4; i++) {
                document.getElementById(`attack${i + 1}`).textContent = data.moves[i]?.move.name || `Ataque ${i + 1}`;
            }
        }

    } catch (error) {
        console.error('Erro ao buscar dados do Pokémon:', error);
    }
}

// Função para enviar o ataque escolhido via AJAX
function enviarAtaque(ataqueEscolhido) {
    fetch('classes/batalha.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `ataque=${encodeURIComponent(ataqueEscolhido)}`,
    })
    .then(response => response.json())
    .then(data => {
        // Atualiza o estado dos Pokémon na tela
        document.getElementById('player-hp').textContent = data.pokemon1_hp;
        document.getElementById('opponent-hp').textContent = data.pokemon2_hp;

        // Verifica o status da batalha
        if (data.status === 'vitoria' || data.status === 'derrota') {
            alert(data.mensagem); // Informa quem venceu
        } else {
            alert(data.mensagem); // Exibe o ataque que foi realizado
        }
    })
    .catch(error => console.error('Erro na batalha:', error));
}

// Adicionar eventos aos botões de ataque
document.querySelectorAll('.attack-btn').forEach(button => {
    button.addEventListener('click', function() {
        const ataqueEscolhido = this.textContent; // Pega o nome do ataque
        enviarAtaque(ataqueEscolhido); // Envia para o PHP
    });
});

// Função para iniciar a batalha
function startBattle() {
    // Buscar Pokémon do jogador
    fetchPokemonData('pikachu', true);

    // Buscar Pokémon oponente
    fetchPokemonData('charmander', false);
}

// Iniciar a batalha quando a página carregar
window.onload = startBattle;
