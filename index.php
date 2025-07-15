<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la petición y guardar el resultado en $data
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch); // Cerrar la sesión de cURL

?>

<head>
    <title>La Próxima Película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
        <img
                src="<?= $data["poster_url"]; ?>"; width="200"; alt="Poster de <?= $data["title"]; ?>"
                style="border-radius: 16px" />
        <h2>La próxima película de Marvel</h2>
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
        <p>Fecha de estreno <?= $data["release_date"]; ?> </p>
        <p>La siguiente es <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>

</main>

<style>
    :root {
        color-scheme: light dark;
    }
    body {
        display: grid;
        place-content: center;
    }

    section{
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }


    img{
        margin: 20 auto;
    }
</style>