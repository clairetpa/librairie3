{{ include ('header.php', {title:'Editer livres'})}}


<main>
    <div class="livre__editer">
        <a href="{{path}}" class="btn">Retour a la liste</a>
    </div>
    <div class="grid-detail">  
        <div>
            <form method="POST" action="ajouter">
                <h3>Editeur</h3>
                <div>
                    {% if errors is defined %}
                        <span class="error">{{ errors|raw }}</span>
                    {% endif %}
                </div>
                <div class="form">
                    <div class="form-left">
                        <div class="form__item">
                            <div class="label">Editeur:</div>
                            <div class="input">
                                <input type="text" name="nomEditeur" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-right">
                        <div class="submit-container">
                            <!-- si on a l'id on affiche le bouton supprimer -->
                            <input class="submit" type="submit" value="Sauvegarder">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
</body>

</html>