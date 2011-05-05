<form method="POST" class="send-email-form">
<?php print_r( params() ) ?>

  <p>
    <label for="to"><?php echo __('Email addresses (space separated)') ?> :</label>
    <input type="text" class="to" name="to" value=""/>
  </p>
  <p>
    <label for="msg"><?php echo __('Message (file url will automatically be added)')?>:</label>
    <textarea cols="80" rows="10" name="msg" value="<?php echo params ('msg') ?>"></textarea>
  </p>
  <p>
    <a href="#" class="open-email-client" target="_blank"><?php echo __('Open in my email client') ?></a>
    <script type="text/javascript">
      $(document).ready (function () {
        $('.open-email-client').click (function (e) {
          $('.ui-dialog-content').dialog('close');
        });
      });
    </script>
  </p>
  <p class="submit">
    <input type="submit" class="awesome blue large" value="<?php echo __('Send') ?>" />
  </p>
</form>
<?php 
echo $check 
?>