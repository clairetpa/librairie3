{{ include ('header.php', {title:'Login'})}}
<main>
    <div class="login-wrapper">
        <div class="login-title">Se connecter</div>
        {% if errors is defined %}
            <span class="error">{{ errors|raw }}</span>
        {% endif %}
        <form action="{{path}}/login/authentication" method="POST">


            <div class="login-input-container">

                <div class="label-container">
                    <div class="login-label">Adresse courriel</div>
                    <div class="login-label">Mot de passe</div>
                </div>


                <div class="input-container">

                    <div class="login-input">
                        <input type="email" name="username" value="{{ user.username }}">
                    </div>
                    <div class="login-input">
                        <input type="password" name="password" value="{{ user.password }}">
                    </div>
                </div>
            </div>


            <div class="login-button-container">
                <input class="login-button"type="submit" value="Se connecter">
            </div>
            <div class="login-subtitle">Pas encore de compte? <a href="{{path}}/user/create">Créer un compte</a></div>
        </form>
    </div>

</main>
</body>

</html>
