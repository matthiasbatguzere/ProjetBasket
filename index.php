<!DOCTYPE html>
<html>
<head>
    <title>Mon Site - Liste des Joueurs</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1E2D4E;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #121B30;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .navbar li {
            float: left;
        }
        .navbar li.right {
            float: right;
        }
        .navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #283C63;
        }
        .player-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: #1E2D4E;
            padding: 20px;
        }
        .player-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            background-color: #FFF;
            width: 300px;
            text-align: center;
        }
        .player-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Joueur</a></li>
            <li><a href="equipe.php">Équipe</a></li>
            <li><a href="match.php">Match</a></li>
            <li class="right"><a href="login.php">Connexion</a></li>
            <li class="right"><a href="createaccount.php">Création de compte</a></li>
        </ul>
    </div>
    <div class="player-cards">
    <?php
    $curl_page_count = curl_init();
    curl_setopt($curl_page_count, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/players');
    curl_setopt($curl_page_count, CURLOPT_RETURNTRANSFER, true);
    $response_page_count = curl_exec($curl_page_count);
    curl_close($curl_page_count);

    $total_pages = json_decode($response_page_count, true)['meta']['total_pages'];

    for ($page = 1; $page <= $total_pages; $page++) {
        $curl_players = curl_init();
        curl_setopt($curl_players, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/players?page=' . $page);
        curl_setopt($curl_players, CURLOPT_RETURNTRANSFER, true);
        $response_players = curl_exec($curl_players);
        curl_close($curl_players);

        $players = json_decode($response_players, true)['data'];

        foreach ($players as $player) {
            echo '<div class="player-card">';
            echo '<a href="joueur.php?id=' . $player['id'] . '">';
            echo '<h3>' . $player['first_name'] . ' ' . $player['last_name'] . '</h3>';
            echo '</a>';
            echo '</div>';
        }
    }
    ?>
</div>

