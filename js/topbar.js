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
    //traitement ajax pour connexion membre

    /* 
        $('#connexion_membre').click(function(e) {
            //swal('merci seigneur');
            var nom1 = $('#email').val();
            var password1 = $('#password').val();
            if (nom1 == "" || password1 == "") {
                swal({
                    title: "Pas de chance!",
                    text: "Veuillez entrer vos identifiants svp!",
                    icon: "error",
                });
                e.preventDefault();
            } else {
                $.ajax({
                    type: "POST",
                    url: 'ajax/process.php',
                    data: {
                        email: nom1,
                        password: password1
                    },
                    success: function(data) {
                        if (data === 'success') {
                            swal('très bien papa');
                        } else {
                            swal('okoki kokotisa te?, tala bien');
                        }
                    }

                });

            }


        });


        */

    //version openclassroom, connexion membre avec ajax
    /* $('.connexionmembers').submit(function(e) {
        // swal('super monsieur');
        $.ajax({
            type: "POST",
            url: "index.php?page=processTopbar",
            data: $('.connexionmembers').serialize(),
            success: function(data) {
                swal(data)
            }
        })
        e.preventDefault();
    }) */
});