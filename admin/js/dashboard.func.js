$(document).ready(function(){
    $(".voir_com").click(function(){
        var commentaire = $(this).attr("commentaire");
        var id = $(this).attr("id");
        //alert('zoba:'+ id); //test pour detecter id
        $.post('ajax/voir_com.php',{id:id},function(){
            $("#commentaire_"+id).hide();
            swal("Le Commentaire: ", commentaire +"  est passé en vue!");
            //location.reload(); //pour refraichir automatiquement la page
        });
        
    });

    //fonction pour bouton supprimer

    $(".supp_com").click(function(){
        var commentaire = $(this).attr("commentaire");
        var id = $(this).attr("id");
        //alert('zoba:'+ id); //test pour detecter id
        $.post('ajax/supp_com.php',{id:id},function(){
            $("#commentaire_"+id).hide();
            swal("Le Commentaire: ", commentaire +"  est supprimé!");
            //location.reload(); //pour refraichir automatiquement la page
        });
        
    });

    
});