
<?php
if(!isset($_SESSION['id_membre']))
{	$_SESSION['alert'] = "Désolé, Vous devrez se connecter pour y acceder!";
	$_SESSION['alert_code'] = "error";
	
}
?>
	<!--Coded With Love By Hugues eyong-->
	<div class="bg-tchat">
			<!--titre du Messagerie-->
		<div class="jumbotron text-center">
			<div class="container">
			<h1 class="jumbotron-heading">Messagerie Instantanée de Rhema divine !</h1>
			<p class="lead text-muted">Bienvenue dans la plateforme de discussions instantanée de rhema divine, discuter entre vous pour plus d'édification.</p>
			</div>
		</div>
		<?php
		if(isset($_SESSION['id_membre']))
		{?>
		<div class="mb-3">
			<div class="row justify-content-center">
				<div class="col-md-8 offset-2 col-xl-8 chat mt-3"><div class="card_hauteur mb-sm-3 mb-md-0 contacts_card mt-5">
					<div class="card-header-tchat">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
							<li class="active_user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="images/tchat/olive.jpg" class="rounded-circle user_img">
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Handy</span>
										<p>Handy is online</p>
									</div>
								</div>
							</li>
							<div id="user_details">	
							</div>
						</ui>
					</div>
				</div>
            </div>
        </div>
		<?php
		} ?>

	</div>
	

    
    
