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
  $(document).ready(function() {
    // create the datepickers
    $(".datepicker").datepicker();
/* TODO css for date picker */
  });
</script>

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
        <?php // TODO show/hide datepicker, extend accordingly, etc. ?>
        <a href="#" onclick='$("#file<?php echo $file->id ?>").toggle("slow");' class="extend" title="<?php echo __('Extend the file lifetime') ?>">
            <?php echo __('Extend the file lifetime') ?>
        </a>
        <span type="text" class="datepicker" id="file<?php echo $file->id ?>" style="display:none;"></span>
      <?php endif ?>
    </td>
    <td><?php echo $file->getReadableFileSize () ?></td>
    <td><?php echo (int) $file->download_count ?></td>
    <td><a href="<?php echo $file->getDownloadUrl () . '/delete' ?>"><?php echo __('Delete') ?></a></td>
<?php endforeach ?>
</table>
