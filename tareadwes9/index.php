<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeAPI Demo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>PokeAPI Demo</h1>

        <?php
        /**
         * @author Jesús Casanova Pablos <jesucasa@ucm.es>
         */
        // Verificar si se ha hecho clic en el botón
        if (isset($_GET['random'])) {
            // Llamada aleatoria a la API de PokeAPI
            $randomPokemonId = rand(1, 898); // Hay 898 Pokémon en total
            $pokemonEndpoint = "https://pokeapi.co/api/v2/pokemon/{$randomPokemonId}";
            $pokemonData = json_decode(file_get_contents($pokemonEndpoint));//Convertimos el endpoint en formato json

            // Mostrar información del Pokémon
            if ($pokemonData) {
                echo '<h2>' . $pokemonData->name . '</h2>';
                echo '<p>Número: #' . $pokemonData->id . '</p>';
                
                // Mostrar tipos
                echo '<p>Tipo(s): ';
                foreach ($pokemonData->types as $type) {
                    echo $type->type->name . ' ';
                }
                echo '</p>';

                // Mostrar habilidades
                echo '<p>Habilidades: ';
                foreach ($pokemonData->abilities as $ability) {
                    echo $ability->ability->name . ' ';
                }
                echo '</p>';

                echo '<img src="' . $pokemonData->sprites->front_default . '" alt="' . $pokemonData->name . '">';
            } else {
                echo '<p>No se pudo obtener la información del Pokémon.</p>';
            }
        }
        ?>

        <!-- Botón "Pokemon Random" -->
        <form method="get">
            <button type="submit" name="random">Pokemon Random</button>
        </form>
    </div>

</body>
</html>
