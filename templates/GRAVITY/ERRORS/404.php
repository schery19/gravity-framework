<?php $title = "Erreur !" ?>
<center><h1 style="color: red; margin-bottom: 50px; margin-top: 20px;">Oupsss! Erreur 404</h1></center>
<p><?= isset($error)?$error:'' ?></p>
<center><a role="button" class="btn btn-success btn-lg" style="margin-bottom: 60px;" href="<?= $this->generateUrl('/') ?>">Continuer à naviguer</a></center>
