<?php
require_once 'connexion.php';
$query = "SELECT * FROM membre WHERE id_membre != ' ".$_SESSION['id_membre']."' ";

$statement = $connexion->prepare($query);
$statement ->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);


foreach($result as $row)
{   
    $current_timestamp = strtotime(date('Y-m-d H:i:s') . '-10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row->id_membre,$connexion);
    if($user_last_activity > $current_timestamp)
    {
        $statut = '<span class="online_icon"></span>';
    }
    else
    {
        $statut = '<span class="online_icon offline"></span>';
    }
    $outpout = '
    <a href=""><li class="start_chat start_chat1">
        <div class="d-flex bd-highlight">
            <div class="img_cont">
                <img src="images/tchat/'.$row->image.'" class="rounded-circle user_img">
                '.$statut.'
            </div>
            <div class="user_info">
                <span class="">'.$row->nom.' '.$row->prenom.'</span>
                <p>'.$row->prenom.' left 30 mins ago</p>
            </div>
        </div>
    </a></li><hr>
';
echo $outpout;
}

