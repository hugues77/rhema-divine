<?php
if(redacteur()){
    header('Location:index.php?page=dashboard');
}


?>
<div class="container">
    <h2>Ma Bible Online</h2>
    <small class="text-danger">Attention !! une Amélioration vient d'etre enregistrer, on peut maintenant tracer chaque Admin et vous pouvez seulement voir vos derniers posts!<!-- Ce formulaire vous permet de construire une bible authentique et unique pour rhema-divine en vue de l'oeuvre de l'édification des internautes, Attention! En cas d'erreur, contacter l'Admin --></small><hr>
    <div class="return"></div>
    <div class="row">
        <div class="col-md-7 afficher">
            <!-- <h4 class="">Jean 4</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ut modi expedita, perspiciatis ab sunt consectetur recusandae provident. Delectus expedita, pariatur itaque cumque doloremque eveniet facilis quidem molestias beatae debitis.</p>
     --></div>
        <div class="col-md-5">
            <form  method="post" class="formulaire">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="titre"><h4>Titre de l'enseignement</h4></label>
                            <input id="titre" type="text" class="form-control titre" name="titre">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="code"><h4>J</h4></label>
                            <input id="code" type="number" class="form-control code" name="code">
                        </div>
                    </div>
                </div>
                <h4 class="mt-2">Sélectionner le chapitre et le verset </h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select id="inputState" name="livre"  class="form-control livre">
                                <option value="Matthieu" selected>Matthieu</option>
                                <option value="Luc">Luc</option>
                                <option value="Philippiens">Philippiens</option>
                                <option value="Colossiens">Colossiens</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <input  type="number" class="form-control chapitre" name="chapitre" placeholder="Chapitre">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input  type="number" class="form-control verset" name="verset" placeholder="Verset">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="inputState1" name="categ_livre"  class="form-control categ_livre">
                                <option value="nouveau_test" selected>Nouveau Testament</option>
                                <option value="ancien_test">Ancien Testament</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="inputState2" name="type_liv"  class="form-control type_liv">
                                <option value="Les Evangiles" selected>Les Evangiles</option>
                                <option value="Epîtres de Paul">Epîtres de Paul</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4 class="mt-2">Votre message</h4>
                <textarea class="form-control mt-2 texte" name="texte" rows="4"></textarea>
                <button class="btn btn-primary rounded btn-lg mt-2 submit" type="submit" name="submit">Poster le verset</button>
            </form>
        </div>
    </div>
</div>