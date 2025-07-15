<?php
// Define the public MCU API endpoint
const API_URL = "https://whenisthenextmcufilm.com/api";

// Initialize a new cURL session
$ch = curl_init(API_URL);

// Set cURL to return the response instead of printing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request and store the response
$response = curl_exec($ch);

// Decode the JSON response into an associative array
$data = json_decode($response, true);

// Close the cURL session
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Next MCU Movie</title>
    <meta name="description" content="Find out when the next Marvel Cinematic Universe movie is released">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
    <style>
        :root {
            color-scheme: light dark;
        }

        body {
            display: grid;
            place-content: center;
            padding: 2rem;
        }

        section, hgroup {
            text-align: center;
        }

        img {
            margin: 0 auto;
            border-radius: 16px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<main>
    <section>
        <img
            src="<?= $data["poster_url"]; ?>"
            alt="Poster of <?= $data["title"]; ?>"
            width="200"
        >
        <h2>Upcoming Marvel Movie</h2>
    </section>

    <hgroup>
        <h3><strong><?= $data["title"]; ?></strong> releases in <?= $data["days_until"]; ?> days</h3>
        <p>📅 Release date: <?= $data["release_date"]; ?></p>
        <p>🎬 Next up: <em><?= $data["following_production"]["title"]; ?></em></p>
    </hgroup>
</main>
</body>
</html>
