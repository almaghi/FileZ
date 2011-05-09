<h2><?php echo __('Manage files') ?></h2>

<!-- TODO : find a jquery plugin to order and paginate the user list -->

<table id="file_list" class="data">
  <tr>
    <th><?php echo __('Name') ?></th>
    <th><?php echo __('Author') ?></th>
    <th><?php echo __('Availability') ?></th>
    <th><?php echo __('Size') ?></th>
    <th><?php echo __('DL count') ?></th>
    <th><?php echo __('Actions') ?></th>
  </tr>

<script>
/* TODO css for date picker */

  $(document).ready(function() {
    // create the datepickers and set its options
    $('.datepicker').datepicker({

        // date selection range
        maxDate: '+<?php echo fz_config_get ('app', 'max_extend_count') ?>d',
        minDate: '+1d',

        // define an alternative field to receive an alternative date format
        altField: "#alternate",
        // alternative date format (ISO, not localized) to be used in URL
        altFormat: 'yy-mm-dd',

        // On date selection, append the submission link with the date in ISO format (/:fileHash/extend/:date)
        onSelect: function(dateText, inst) {
              var fileId = $(this).attr('name');
              // This is the link on the submit button
              var link = 'a#'+ fileId;
              var originalHref = $(link).attr('href');
              // append the link with the date in ISO format
              $(link).attr('href', originalHref+'/'+$("#alternate").val());
            }
        });
  });
</script>
<input id="alternate" style="display:none" />

<?php foreach ($files as $file): ?>
  <tr>
    <td><a href="<?php echo $file->getDownloadUrl () ?>"><?php echo h($file->file_name) ?></a></td>
    <td>
      <a href="<?php echo url_for ('/admin/users/'.$file->getUploader ()->id) ?>">
        <?php echo h($file->getUploader ()) ?> (<?php echo h($file->getUploader()->username) ?>)
      </a>
    </td>
    <td><?php echo __r('from %from% to %to%', array (
      'from' => ($file->getAvailableFrom  ()->get (Zend_Date::MONTH) ==
                 $file->getAvailableUntil ()->get (Zend_Date::MONTH)) ?
                 $file->getAvailableFrom ()->toString ('d') : $file->getAvailableFrom ()->toString ('d MMMM'),
      'to' =>  '<b>'.$file->getAvailableUntil ()->toString ('d MMMM').'</b>')) // FIXME I18N ?>
      <?php if ($file->extends_count < fz_config_get ('app', 'max_extend_count')): ?>

        <?php // TODO extend accordingly, etc. ?>
        <a href="#" onclick='$("div#file<?php echo $file->id ?>").toggle();' class="extend" title="<?php echo __('Extend the file lifetime') ?>">
            <?php echo __('Extend the file lifetime') ?>
        </a>
        <div id="file<?php echo $file->id ?>" style="display:none;">
        <?php echo __('Available until:') ?> <input class="datepicker" name="<?php echo $file->id ?>" type="text"/>
        <a href="<?php echo $file->getDownloadUrl () ?>/extend/files" id="<?php echo $file->id ?>" class="awesome blue large"><?php echo __('Send') ?></a>
        </div>

      <?php endif ?>
    </td>
    <td><?php echo $file->getReadableFileSize () ?></td>
    <td><?php echo (int) $file->download_count ?></td>
    <td><a href="<?php echo $file->getDownloadUrl () . '/delete' ?>"><?php echo __('Delete') ?></a></td>
<?php endforeach ?>
</table>
