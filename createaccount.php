<!DOCTYPE html>
<html>
<head>
    <title>Mon Site - Création de Compte</title>
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
        .create-account-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #1E2D4E;
        }
        .create-account-form {
            width: 400px;
            padding: 40px;
            background-color: #FFF;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .create-account-form h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .create-account-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .create-account-form button {
            background-color: #F58634;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .create-account-form button:hover {
            background-color: #D36F2D;
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
            <li class="right"><a href="createaccount.php">Créer un compte</a></li>
        </ul>
    </div>
    <div class="create-account-container">
        <form class="create-account-form" action="process_createaccount.php" method="post">
            <h2>Créer un Compte</h2>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
            <button type="submit">Créer le Compte</button>
        </form>
    </div>
</body>
</html>
