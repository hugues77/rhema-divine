$(document).ready(function() {
    $('#action_menu_btn').click(function() {
        $('.action_menu').toggle();
    });

    //messagerie 
    fetch_user();
    setInterval(function() {
        update_last_activity();
        fetch_user();
    }, 5000);
    /**
     * function pour afficher lles utilisateur enregistré dans la base
     */
    function fetch_user() {
        $.ajax({
            url: "ajax/fetch_user.php",
            method: "POST",
            success: function(data) {
                $('#user_details').html(data);
            }
        })
    }

    /**
     * function pour afficher la statue online ou offline des utilisateurs
     */
    function update_last_activity() {
        $.ajax({
            url: "ajax/update_last_activity.php",
            success: function() {

            }
        })
    }

    /**
     * function pour dialoguer avec les autres
     */
    function make_chat_dialog_box(to_id_membre, to_user_name) {
        var modal_content = '<div class="card_hauteur">';
        modal_content += '<div class="card-header-tchat msg_head">';
        modal_content += '<div class="d-flex bd-highlight">';
        modal_content += '<div class="img_cont">';
        modal_content += '<img src="images/tchat/olive.jpg" class="rounded-circle user_img">';
        modal_content += '<span class="online_icon"></span></div>';
        modal_content += '<div class="user_info">';
        modal_content += '<span>Chat with ' + to_user_name + '</span>';
        modal_content += '<div class="chat_history" data-touserid=" ' + to_id_membre + ' " id="chat_history_' + to_id_membre + '">';
        modal_content += '</div>';
        modal_content += '<p>1767 Messages</p>';
        modal_content += '</div><div class="video_cam">';
        modal_content += '<span><i class="fas fa-video mt-1"></i></span>';
        modal_content += '<span><i class="fas fa-phone mt-1"></i></span></div>';
        modal_content += '</div><span id="action_menu_btn"><i class="fas fa-ellipsis-v mr-2"></i></span>';
        modal_content += '<div class="action_menu"><ul>';
        modal_content += '<li><i class="fas fa-users"></i> Add to close friends</li>';
        modal_content += '<li><i class="fas fa-plus"></i> Add to group</li>';
        modal_content += '<li><i class="fas fa-ban"></i> Block</li>';
        modal_content += '</ul></div>';
        modal_content += '</div><hr class="blanc">';
        modal_content += '<div class="card-body msg_card_body">';
        modal_content += '</div>';

        modal_content += '</div><div class="card-footer mt-2">';
        modal_content += '<div class="input-group">';
        modal_content += '<div class="input-group-append">';
        modal_content += '<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>';
        modal_content += '</div><textarea name="chat_message_' + to_id_membre + '" id="chat_message_' + to_id_membre + '" class="form-control type_msg" placeholder="Type your message..."></textarea>';
        modal_content += '<div class="input-group-append">';
        modal_content += '<span name="send_chat" id=" ' + to_id_membre + ' " class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>';
        modal_content += '</div></div></div>';

        $('#user_model_details').html(modal_content);
    }
    $(document).on('click', '.start_chat', function() {
        var to_id_membre = $(this).data('touserid');
        var to_user_name = $(this).data('tousername');
        make_chat_dialog_box(to_id_membre, to_user_name);

    });

});