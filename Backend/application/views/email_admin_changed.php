<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------------
?>
<p>Hi <?php echo $email_address; ?>, 
<br/>
<br/>
Administrator email changed to <?php echo $new_email_address; ?>.
<br/>
<br/>
If you have any questions, please reach out to us at <?php echo "contact_email@gmail.com"; ?>.
<br/>
<br/>
Thank you and see you soon!
<br/>
<br/>
Team <?php echo $this->session->userdata("system_title"); ?>
</p>
<?php
