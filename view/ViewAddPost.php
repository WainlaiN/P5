<?php dump($datas) ?>
<h1>Ajouter un Article</h1>
<p><a href="/admin">Retour à la liste des billets</a></p>


<form action="/admin/add"  method="post">

    <div class="form-group">
        <label for="author">Auteur</label>
        <input type="text" id="author" name="author" value="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="author">Titre</label>
        <input type="text" id="title" name="title" value=">" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="author">Chapo</label>
        <input type="chapo" id="chapo" name="chapo" value="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="comment">Description</label>
        <textarea id="description" name="description" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Modifier">
    </div>

</form>

