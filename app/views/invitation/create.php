<h2>Invite someone to upload one file </h2>
<p>
Filez will then send an email to the invited user containing unique URL (ex: filez.domain/invitation/sdf12DSK139NSsdns89 ) which will be valid until a file is uploaded.

This URL will allow him to log in filez without password until the link has expired.

Enter informations about the invited user (name, email).
<!--
Once the invited user has upload a file, the invitation link will be invalidated and the user logged out. 
The user who created the invitation will be notified (?).

Available configuration :

max_invitation_per_user
invitation_lifetime (in days)

Create a fz_invitation table with the following column : 
id, code, invited_user, created_by, created_at expire_at
-->
</p>

<?php echo partial ('invitation/_invitationForm.php', array ('user' => $user, 'check'=>$check)) ?>