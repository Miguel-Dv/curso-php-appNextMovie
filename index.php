
<?php

// Assign api URL to a constant valur (const values uses uppercase)
const API_URL = "https://www.whenisthenextmcufilm.com/api";
# Start a new cURL session; ch = cURL handle
$ch = curl_init(API_URL);
// Set to recieve petition and no show it on the screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Excecute petition
   and save result
*/
$result = curl_exec($ch);

// Alternative if only is needed to do a GET from an API: file_get_contents
// $result = file_get_contents(API_URL);

$data = json_decode($result, true);

curl_close($ch);

?>

<head>
    <meta charset="UTF-8" />
    <title>Marvel's Next Movie</title>
    <meta name="description" content="Marvel's Next Movie Premier" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
    <hgroup>
      <h5><?= $data["title"]; ?> releases in <?= $data["days_until"]; ?> days</h5>
      <p>Release date: <?= $data["release_date"]; ?></p>
      <p>Next movie is: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
    <section>
        <img 
            src="<?= $data["poster_url"]; ?>" width="350" alt="<?= $data["title"]; ?>'s poster" 
            style="border-radius: 16px" />
        
    </section>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    
    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }
    
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
 </style>