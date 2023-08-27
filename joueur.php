<!DOCTYPE html>
<html>
<head>
    <title>Mon Site - Détails du Joueur</title>
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
        .player-details {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            background-color: #FFF;
        }
        .player-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .player-details p {
            font-size: 16px;
            margin: 5px 0;
            color: #555;
        }
        .team-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }
        .team-button:hover {
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
    
    <div class="player-details">
        <?php
        if (isset($_GET['id'])) {
            $player_id = $_GET['id'];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/players/' . $player_id);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            $player_details = json_decode($response, true);

            if ($player_details && isset($player_details['first_name']) && isset($player_details['last_name'])) {
                echo '<h2>' . $player_details['first_name'] . ' ' . $player_details['last_name'] . '</h2>';
                echo '<p><strong>Position :</strong> ' . $player_details['position'] . '</p>';
                
                if ($player_details['height_feet'] && $player_details['height_inches']) {
                    echo '<p><strong>Taille :</strong> ' . $player_details['height_feet'] . '\'' . $player_details['height_inches'] . '\"</p>';
                } else {
                    echo '<p><strong>Taille :</strong> N/A</p>';
                }
                
                if ($player_details['weight_pounds']) {
                    echo '<p><strong>Poids :</strong> ' . $player_details['weight_pounds'] . ' lbs</p>';
                } else {
                    echo '<p><strong>Poids :</strong> N/A</p>';
                }

                echo '<h3>Équipe :</h3>';
                echo '<p><strong>Abbréviation :</strong> ' . $player_details['team']['abbreviation'] . '</p>';
                echo '<p><strong>Équipe :</strong> ' . $player_details['team']['full_name'] . '</p>';
                echo '<p><strong>Ville :</strong> ' . $player_details['team']['city'] . '</p>';
                echo '<p><strong>Conférence :</strong> ' . $player_details['team']['conference'] . '</p>';
                echo '<p><strong>Division :</strong> ' . $player_details['team']['division'] . '</p>';
                echo '<a class="team-button" href="equipe.php?id=' . $player_details['team']['id'] . '">Voir l\'équipe</a>';
            } else {
                echo '<p>Impossible de récupérer les détails du joueur.</p>';
            }
        } else {
            echo '<p>Aucun joueur sélectionné.</p>';
        }
        ?>
    </div>
</body>
</html>
