<?php
  $html = get_site_option('pp_html');
?>
<div class="wrap">
  <h2>Profile Profiler</h2>
<form method="post" action="options.php">
<?php
  settings_fields( 'pp-group' );
  do_settings_sections( 'default' );
?>
<table class="form-table">
  <tbody>
    <th scope="row"><label for="pp_html">HTML and Styles</label></th>
    <tr>
      Specify [img], [name] and [profile]
    </tr>
    <tr>
      <td>
        <textarea id="pp_html" name="pp_html" rows="10" cols="100"><?php echo $html; ?></textarea>
      </td>
    </tr>
  </tbody>
</table>
<?php submit_button(); ?>
</form>
