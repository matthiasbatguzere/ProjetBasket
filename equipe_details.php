<!DOCTYPE html>
<html>
<head>
    <title>Mon Site - Détails de l'Équipe</title>
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
        .team-details {
            max-width: 800px;
            margin: 80px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }
        .team-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .team-details p {
            font-size: 16px;
            margin: 5px 0;
            color: #555;
        }
        .player-button {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #F58634;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .player-button:hover {
            background-color: #0056b3;
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
    <div class="team-details">
        <?php
        if (isset($_GET['id'])) {
            $team_id = $_GET['id'];

         
            $curl_team = curl_init();
            curl_setopt($curl_team, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/teams/' . $team_id);
            curl_setopt($curl_team, CURLOPT_RETURNTRANSFER, true);
            $response_team = curl_exec($curl_team);
            curl_close($curl_team);

            
            $team_details = json_decode($response_team, true);

            echo '<h2>Détails de l\'équipe</h2>';
            echo '<p><strong>Abbréviation :</strong> ' . ($team_details['abbreviation'] ?? 'N/A') . '</p>';
            echo '<p><strong>Ville :</strong> ' . ($team_details['city'] ?? 'N/A') . '</p>';
            echo '<p><strong>Conférence :</strong> ' . ($team_details['conference'] ?? 'N/A') . '</p>';
            echo '<p><strong>Division :</strong> ' . ($team_details['division'] ?? 'N/A') . '</p>';

          
            $curl_players = curl_init();
            curl_setopt($curl_players, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/players?team_ids[]=' . $team_id);
            curl_setopt($curl_players, CURLOPT_RETURNTRANSFER, true);
            $response_players = curl_exec($curl_players);
            curl_close($curl_players);

            
            $players = json_decode($response_players, true)['data'];

            if (!empty($players)) {
                echo '<h3>Membres de l\'équipe :</h3>';
                foreach ($players as $player) {
                    echo '<a href="joueur.php?id=' . $player['id'] . '" class="player-button">' . $player['first_name'] . ' ' . $player['last_name'] . '</a>';
                }
            } else {
                echo '<p>Aucun joueur trouvé pour cette équipe.</p>';
            }
        } else {
            echo '<p>Aucune équipe sélectionnée.</p>';
        }
        ?>
    </div>
</body>
</html>
