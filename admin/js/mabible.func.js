$(document).ready(function() {
    //on fait appel au fonction pour afficher dès l'ouverture de page
    recupMessages();
    //on commence à traiter l'insertion des données
    $(".formulaire").submit(function() {
        var titre = $(".titre").val();
        var j = $(".code").val();
        var livre = $(".livre").val();
        var chapitre = $(".chapitre").val();
        var verset = $(".verset").val();
        var categ_livre = $(".categ_livre").val();
        var type_liv = $(".type_liv").val();
        var texte = $(".texte").val();


        $.post(
            'ajax/insertBible.php', { titre: titre, code: j, livre: livre, chapitre: chapitre, verset: verset, categ_livre: categ_livre, type_liv: type_liv, texte: texte },
            function(data) {
                $('.return').html(data);
                $('.titre').val('');
                $('.code').val('');
                $('.verset').val('');
                $('.texte').val('');
                recupMessages();
            });
        return false;
    });

    //fonction pour afficher les messages
    function recupMessages() {
        $.post('ajax/afficheBible.php', function(donnees) {
            $('.afficher').html(donnees);
        });
    }
    //on affiche directement les messages sans actualiser la page
    setInterval(recupMessages, 1000);
});