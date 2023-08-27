<!DOCTYPE html>
<html>
<head>
    <title>Mon Site PHP - Liste des Matchs</title>
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
        .match-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: #1E2D4E;
            padding: 20px;
        }
        .match-card {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            background-color: #FFF;
            width: 300px;
            text-align: center;
        }
        .match-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .match-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
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
    
    <div class="match-cards">
        <?php
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/games');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $matches = json_decode($response, true)['data'];
        if (empty($matches)) {
            echo '<p>Aucun match n\'a été trouvé.</p>';
        } else {
            foreach ($matches as $match) {
                echo '<div class="match-card">';
                echo '<a href="match_details.php?id=' . $match['id'] . '">';
                echo '<h3>' . $match['home_team']['abbreviation'] . ' VS ' . $match['visitor_team']['abbreviation'] . '</h3>';
                echo '<p>' . date('d/m/Y', strtotime($match['date'])) . '</p>';
                echo '</a>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>

