<?php
if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
  global $wpdb;
  $data = $wpdb->get_row( "SELECT * FROM `wp_crud` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="wqpage_heading">Edit Entry</h3>
    <div class="wqform_body">
      <form name="update_form" id="update_form">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Name</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wname" id="wname" placeholder="Enter Your Name" value="<?=$data->name?>" />
        </div>
        <div id="wname_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Phone</div>
        <div class="wqfield">
          <textarea name="wphone" class="wqtextfield" id="wphone" placeholder="Enter Your Phone"><?=$data->phone?></textarea>
        </div>
        <div id="wphone_message" class="wqmessage"></div>

        <div class="wqlabel">email</div>
        <div class="wqfield">
          <textarea name="wemail" class="wqtextfield" id="wemail" placeholder="Enter Your email"><?=$data->email?></textarea>
        </div>
        <div id="wemail_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div><input type="submit" class="wqsubmit_button" id="wqedit" value="Edit" /></div>
        <div>&nbsp;</div>
        <div class="wqsubmit_message"></div>

      </form>
    </div>
  </div>
<?php
} else {
?>
<div class="wrap wqmain_body">
  <h3 class="wqpage_heading">New Entry</h3>
  <div class="wqform_body">
    <form name="entry_form" id="entry_form">

      <div class="wqlabel">Name</div>
      <div class="wqfield">
        <input type="text" class="wqtextfield" name="wname" id="wname" placeholder="Enter Your Title" value="" />
      </div>
      <div id="wname_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div class="wqlabel">Phone</div>
      <div class="wqfield">
        <input type="text" name="wphone" class="wqtextfield" id="wphone" placeholder="Enter Your Phone"/>
      </div>
      <div id="wphone_message" class="wqmessage"></div>

      <div class="wqlabel">Email</div>
      <div class="wqfield">
        <input type="text" name="wemail" class="wqtextfield" id="wemail" placeholder="Enter Your Email"/>
      </div>
      <div id="wemail_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Add" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>

    </form>
  </div>
</div>
<?php } ?>
