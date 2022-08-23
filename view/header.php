<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal de bord</title>

    <!-- le lien vers le css -->
    <link rel="stylesheet" type="text/css" href="{{path}}/styles/styles.css">
</head>
<body>
    <header>
        <h1 class="hero-title">My favorite books</h1>
    </header>
    {% if session.url != 'login' and session.url != 'user' %}
        {% if session.privilege_id != 1 %}
        <nav>
            <div>
                <a href="{{path}}/index.php" class="nav-item">Accueil</a>
            </div>
            <div class="nav-right">
                <div>
                    <a href="#" class="nav-item">Bonjour {{session.username}}</a>
                </div>
                <div>
                    <a href="{{path}}/login/logout" class="nav-item">Déconnexion</a>
                </div>
            </div>
        </nav>
        {% endif %}
        {% if session.privilege_id == 1 %}
        <nav>
            <div class="nav-left">
                <div>
                    <a href="{{path}}/index.php" class="nav-item">Accueil</a>
                </div>
                <div>
                    <a href="{{path}}/journal" class="nav-item">Journal de bord</a>
                </div>
            </div>
            <div class="nav-right">
                <div>
                    <a href="#" class="nav-item">Bonjour {{session.username}}</a>
                </div>
                <div>
                    <a href="{{path}}/login/logout" class="nav-item">Déconnexion</a>
                </div>
            </div>
        </nav>
        {% endif %}
    {% endif %}