{{ include ('header.php', {title:'Journal de bord'})}}

<main> 
    <h3 class="livre__title">Journal de bord</h3> <table>
    <tr>
        <th>Date de visite</th>
        <th>Nom d'utilsateur</th>
        <th>Adresse IP</th>
        <th>Pages visitées</th>
    </tr>
    {% for journal in journaux %}
    <tr>
        <td>{{journal.date_visite}}</td>
        <td>{{journal.username}}</td>
        <td>{{journal.ip}}</td>
        <td>{{journal.page_visitee}}</td>
    </tr>
    {%endfor%}

    </table>
</main>
</body>
</html>
