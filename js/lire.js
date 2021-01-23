
//alert('bonjour lire');
$(document).ready(function(){
    //affiche_bib();
    
    $('.btn_chapitre').click(function(){
    var chapitre = $(this).attr('chapitre'); 
    var livre = $(this).attr('livre');

        //function affiche_bib(){
            $.post('ajax/affichebib.php',{chapitre:chapitre, livre:livre}, function(donnees){
                $('.cacher_description').hide();
                $('.description').html(donnees);
            });
        //}
        //setInterval(affiche_bib(), 1000);
    });
});