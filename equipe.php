<!DOCTYPE html>
<html>
<head>
    <title>Mon Site PHP - Liste des Équipes</title>
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
        .team-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: #1E2D4E;
            padding: 20px;
        }
        .team-card {
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
        .team-card h3 {
            margin: 0;
            font-size: 18px;
            color: #FFA500; 
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
    
    <div class="team-cards">
        <?php
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.balldontlie.io/api/v1/teams');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $teams = json_decode($response, true)['data'];

        if (empty($teams)) {
            echo '<p>Aucune équipe n\'a été trouvée.</p>';
        } else {
            
            foreach ($teams as $team) {
                echo '<div class="team-card">';
                echo '<a href="equipe_details.php?id=' . $team['id'] . '">';
                echo '<h3>' . $team['full_name'] . '</h3>';
                echo '</a>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
