{{ include ('header.php', {title:'Liste livres'})}}

<main>
    {% if session.privilege_id == 1%}
    <div class="livre__editer">
        <a href="{{path}}/livre/creer" class="btn">Ajouter un livre</a>
    </div>
    {% endif %}
    <h2>Liste des livres</h2>
    <div class="grid-list">
        {% for livre in livres %}
        <div class="livre">
            <div class="livre__image">
            {% if livre.image == null%}
                <img src="{{path}}/images/generic-cover.jpg" alt="couverture livre" class="image-livre">
            {% else%}
                <img src="{{path}}/images/{{livre.image}}" alt="couverture livre" class="image-livre">
            {% endif%}
            </div>
            <div class="livre__detail">
                <div class="livre__title">{{livre.titre}}</div>
                <div class="livre__auteur">{{livre.prenomAuteur}} {{livre.nomAuteur}}</div>
                <div class="livre__annee">{{livre.dateParution}}</div>
                <div class="livre__editeur">{{livre.nomEditeur}}</div>
                <div class="livre__genre">{{livre.genre}}</div>
                <div class="livre__editer">
                    {% if session.privilege_id == 1%}
                    <a href="{{path}}/livre/editer/{{livre.idLivre}}" class="btn">Modifier</a>
                    {% else %}
                    <a href="{{path}}/livre/details/{{livre.idLivre}}" class="btn">Détails</a>
                    {% endif%}
                </div>
            </div>
        </div>
        {% endfor %}
    </div>
</main>
</body>

</html>