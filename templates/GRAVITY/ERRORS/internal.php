<?php $title = "Erreur !" ?>

<center><h1 style="color: red; margin-bottom: 50px; margin-top: 20px;">Erreur interne !</h1></center>

<div class"container-fluid">
	<?= isset($error)?$error:'' ?>
</div>

<center><a role="button" class="btn btn-success btn-lg" style="margin-bottom: 60px; margin-top: 10px;" href="/">Continuer à naviguer</a></center>
