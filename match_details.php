<!DOCTYPE html>
<html>
<head>
    <title>Mon Site PHP - Détails du Match</title>
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
        .match-details {
            max-width: 800px;
            margin: 80px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }
        .match-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .match-details p {
            font-size: 16px;
            margin: 5px 0;
        }
        .team-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .team-button {
            padding: 10px 20px;
            background-color: #F58634;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 0 10px;
        }
        .team-button:hover {
            background-color: #D36F2D;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Joueur</a></li>
            <li><a href="equipe.php">Équipe</a></li>
            <li><a href="match.php">Match</a></li>
            <li class="right"><a href="login.php">Connexion</a></li>
            <li class="right"><a href="createaccount.php">Créer un compte</a></li>
        </ul>
    </nav>
    <div class="match-details">
        <?php
        if (isset($_GET['id'])) {
            $match_id = $_GET['id'];
            $curl_match = curl_init();
            curl_setopt($curl_match, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/games/' . $match_id);
            curl_setopt($curl_match, CURLOPT_RETURNTRANSFER, true);
            $response_match = curl_exec($curl_match);
            curl_close($curl_match);
            $match_details = json_decode($response_match, true);

            if (!empty($match_details)) {
                echo '<h2>Détails du Match</h2>';
                echo '<p><strong>Date :</strong> ' . date('d/m/Y', strtotime($match_details['date'])) . '</p>';
                if (isset($match_details['arena']['name'])) {
                    echo '<p><strong>Salle :</strong> ' . $match_details['arena']['name'] . '</p>';
                } else {
                    echo '<p><strong>Salle :</strong> N/A</p>';
                }

                if (isset($match_details['arena']['city'])) {
                    echo '<p><strong>Ville :</strong> ' . $match_details['arena']['city'] . '</p>';
                } else {
                    echo '<p><strong>Ville :</strong> N/A</p>';
                }

                echo '<div class="team-buttons">';
                if (isset($match_details['home_team']['id'], $match_details['home_team']['abbreviation'])) {
                    echo '<a href="equipe_details.php?id=' . $match_details['home_team']['id'] . '" class="team-button">' . $match_details['home_team']['abbreviation'] . '</a>';
                }
                if (isset($match_details['visitor_team']['id'], $match_details['visitor_team']['abbreviation'])) {
                    echo '<a href="equipe_details.php?id=' . $match_details['visitor_team']['id'] . '" class="team-button">' . $match_details['visitor_team']['abbreviation'] . '</a>';
                }
                echo '</div>';
            } else {
                echo '<p>Aucun détail trouvé pour ce match.</p>';
            }
        } else {
            echo '<p>Aucun match sélectionné.</p>';
        }
        ?>
    </div>
</body>
</html>
