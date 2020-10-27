<?php
unset($_SESSION['email']);
unset($_SESSION['pseudo']);
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['image']);
unset($_SESSION['id_membre']); ?>
<script>document.location.replace("index.php?page=index")</script>