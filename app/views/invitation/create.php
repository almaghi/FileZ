<?php echo $check ?>  
<h2>Envoyer le fichier par email <span class="filename">(<?php echo h($user->username) ?>)</span></h2>


<?php echo partial ('invitation/_invitationForm.php', array ('user' => $user, 'check'=>$check)) ?>
