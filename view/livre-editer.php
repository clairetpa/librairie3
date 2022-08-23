{{ include ('header.php', {title:'Livre'})}}
<main>
    <!-- Si il y a l'id on fera une modification sinon c est une creation -->
    {% if mode == 'creation'%}
        <h2>Créer</h2>
    {% else %}
        <h2>Modifier</h2>
    {% endif %}
            <div class="wrapper">  
                <div>
                    <h3>Livre</h3>
                    <div>
                    {% if errors is defined %}
                        <span class="error">{{ errors|raw }}</span>
                    {% endif %}
                    </div>
                    <div class="form">

                        <div class="form-left">
                            {% if mode == 'creation'%}
                            <h2>Créer</h2>
                            <form method="POST" action="ajouter">
                            {% else %}
                            <h2>Modifier</h2>
                            <form method="POST" action="{{path}}/livre/save">
                                <input type="hidden" name="idLivre" value="{{idLivre}}">
                            {% endif %}
                            <div class="form__item">
                                <div class="label">Titre:</div>
                                <div class="input"><input type="text" name="titre" value="{{titre}}" ></div>
                            </div>
                            <div class="form__item flex">
                                <div class="label">Auteur:</div>
                                <div class="input flex">
                                    <select name="idAuteur">
                                        <option value="AuteurNotSeleted">Veuillez choisir un auteur</option>
                                        {% for auteur in auteurs %}
                                            <option value="{{auteur.idAuteur}}" {% if idAuteur==auteur.idAuteur %} selected {% endif %}>{{auteur.prenomAuteur}} {{auteur.nomAuteur}}</option>
                                        {% endfor %}
                                    </select>
                                    <a href="{{path}}/auteur" class="btn-small">+</a>
                                </div>
                            </div>



                            <div class="form__item">
                                <div class="label">Date:</div>
                                <div class="input"><input type="text" name="dateParution" placeholder="ex: 2022-05-21" value="{{dateParution}}" ></div>
                            </div>
                            <div class="form__item">
                                <div class="label">Genre:</div>
                                <div class="input">
                                    <select name="idGenre">
                                        <option value="GenrerNotSeleted">Veuillez choisir un genre</option>
                                        {% for genre in genres %}
                                            <option value="{{genre.idGenre}}" {% if idGenre==genre.idGenre %} selected {% endif %}>{{genre.genre}}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>

                            <div class="form__item">
                                <div class="label">Editeur:</div>
                                <div class="input flex">
                                    <select name="idEditeur">
                                        <option value="EditeurNotSeleted">Veuillez choisir un éditeur</option>
                                        {% for editeur in editeurs %}
                                            <option value="{{editeur.idEditeur}}" {% if idEditeur==editeur.idEditeur %} selected {% endif %}>{{editeur.nomEditeur}}</option>
                                        {% endfor %}
                                    </select>
                                    <a href="{{path}}/editeur/index" class="btn-small">+</a>
                                </div>
                            </div>
                            <div class="form__item">
                                <div class="label">Résumé:</div>
                                <div class="input">
                                    <textarea name="resume" rows="12" cols="36"  >{{resume}}</textarea>
                                </div>
                            </div>

                            <div class="spacing"></div>

                            <div class="submit-container">
                                <!-- si on a l'id on affiche le bouton supprimer -->
                                <input class="submit" type="submit" value="{{ (mode == 'creation') ? 'Créer' : 'Sauvegarder' }}">
                                {% if mode != 'creation' %}
                                <a href="{{path}}/livre/supprimer/{{idLivre}}" class="supprimer">Supprimer</a>
                                {% endif%}
                            </div>
                        </form>
                        </div>
                        
                        <div class="form-right">
                            <form enctype="multipart/form-data" action="{{path}}/livre/image/{{idLivre}}" method="post">
                                <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                Image : <input name="userfile" type="file" />
                                <input type="submit" value="Envoyer le fichier" />
                            </form>

                            <div class="image-livre-wrapper">
                                {% if image == null%}
                                    <img src="{{path}}/images/generic-cover.jpg" alt="couverture livre" class="image-livre">
                                {% else%}
                                    <img src="{{path}}/images/{{image}}" alt="couverture livre" class="image-livre">
                                {% endif%}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
</main>
</body>

</html>