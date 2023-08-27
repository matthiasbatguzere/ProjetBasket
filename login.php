<!DOCTYPE html>
<html>
<head>
    <title>Mon Site - Connexion</title>
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
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #1E2D4E;
        }
        .login-form {
            width: 400px;
            padding: 40px;
            background-color: #FFF;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            background-color: #F58634;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #D36F2D;
        }
        .login-form p {
            margin-top: 15px;
            text-align: center;
        }
        .login-form a {
            color: #F58634;
            text-decoration: none;
        }
        .login-form a:hover {
            text-decoration: underline;
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
    <div class="login-container">
        <form class="login-form" action="process_login.php" method="post">
            <h2>Connexion à votre Compte</h2>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se Connecter</button>
            <p>Pas encore de compte ? <a href="createaccount.php">Créer un compte</a></p>
        </form>
    </div>
</body>
</html>
.login-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>
        
        <?php
        session_start();
        
        if (isset($_SESSION['user_id'])) {
            header("Location: accueil.php"); 
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
            $username = $_POST['username'];
            $password = $_POST['password'];
            
         
            if ($username === "votre_nom_utilisateur" && $password === "votre_mot_de_passe") {
                $_SESSION['user_id'] = 1; 
                header("Location: accueil.php"); 
            } else {
                echo '<p class="error-message">Identifiants invalides. Veuillez réessayer.</p>';
            }
        }
        ?>
        <?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: accueil.php"); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    header("Location: accueil.php");
}
?>
        <form method="POST" class="login-form">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>

