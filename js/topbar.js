$(document).ready(function() {
    //$('.action_topbar').hide();
    $('#action_topbar_btn').click(function() {
        $('.action_topbar').toggle();
    });

    // traitement formulaire de connexion membre

    // $('form').submit(function(e) {
    //     e.preventDefault();
    //     var $form = $(this);
    //     $.post($form.attr('action'), $form.serialize())
    //         .done(function(data) {
    //             $('#html').html(data);
    //             $('#exampleModal').modal("hide");
    //         })
    //         .fail(function() {
    //             confirm("zoba");
    //         });
    // })

    //on exploite switAlert pour message erreur ou du connexion Membre




});