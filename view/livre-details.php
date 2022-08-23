{{ include ('header.php', {title:'Livre'})}}
<main>

            <div class="wrapper">  
                <div>
                    <h3>Livre</h3>
                    <div class="form">

                        <div class="form-left">
                            <div class="form__item">
                                <div class="label">Titre:</div>
                                <div class="input"><input type="text" name="titre" value="{{titre}}" disabled></div>
                            </div>
                            <div class="form__item flex">
                                <div class="label">Auteur:</div>
                                <div class="input flex">
                                    <select name="idAuteur" disabled>
                                        <option value="AuteurNotSeleted">Veuillez choisir un auteur</option>
                                        {% for auteur in auteurs %}
                                            <option value="{{auteur.idAuteur}}" {% if idAuteur==auteur.idAuteur %} selected {% endif %}>{{auteur.prenomAuteur}} {{auteur.nomAuteur}}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>



                            <div class="form__item">
                                <div class="label">Date:</div>
                                <div class="input"><input type="text" name="dateParution" placeholder="ex: 2022-05-21" value="{{dateParution}}" disabled></div>
                            </div>
                            <div class="form__item">
                                <div class="label">Genre:</div>
                                <div class="input">
                                    <select name="idGenre" disabled>
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
                                    <select name="idEditeur" disabled>
                                        <option value="EditeurNotSeleted">Veuillez choisir un éditeur</option>
                                        {% for editeur in editeurs %}
                                            <option value="{{editeur.idEditeur}}" {% if idEditeur==editeur.idEditeur %} selected {% endif %}>{{editeur.nomEditeur}}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class="form__item">
                                <div class="label">Résumé:</div>
                                <div class="input">
                                    <textarea name="resume" rows="12" cols="36" disabled >{{resume}}</textarea>
                                </div>
                            </div>

                        </div>
                        
                        <div class="form-right">
                            <h4>Image de couverture</h2>    
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