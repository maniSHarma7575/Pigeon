<?php $this->setSiteTitle('Launch Campaign'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container-fluid">
  <div class="row m-5" style="vertical-align:middle;">
    <?php
    if (!empty($this->displayErrors)) {
	 if($this->displayErrors=='No')
      {?>
        <script>swal("Oops!", "Build your subscriber list today", "error");</script>
     <?php }
      else
      {
      echo '<div class="alert alert-warning" style="height:45px" role="alert">';
      echo $this->displayErrors;
      echo '</div>';
	}
    } ?>
    <div class="col-lg-12 bg-dark text-white">
      <div class="row" style="background:#58a0c3;">
        <div class="col-lg-6">
          <h4 class="pt-2" style="color:black;font-weight:bold;">New Campaign</h4>
        </div>
        <div class="col-lg-6 pt-2 message-box-icon">
          <span class="pull-right">
            <a href="<?= PROOT ?>Dashboard/"><i class="fa fa-times" aria-hidden="true"></i></a>
          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-12 p-0 message-box-input">
      <form method="post" action="" enctype="multipart/form-data" id="campaignform">
        <div class="form-group">
          <input type="text" class="form-control" id="campaignname" name="name" required placeholder="Campaign Name">
          <input type="text" class="form-control" id="campaignsubject" name="subject" required placeholder="Subject">
          <textarea class="form-control" id="Description" name="body" required rows="8"></textarea>
        </div>
        <div class="message-box-last-content p-2">
          <button type="submit" class="btn btn-primary btn-sm pl-3 pr-3">SEND</button>
          <span>
            <input type="file" name="uploaded_file" />
          </span>
          <span class="pull-right">
            <i class="fa fa-trash-o fa-2x" onclick="document.getElementById('campaignform').reset();" aria-hidden="true"></i>
          </span>
        </div>
    </div>
    </form>
  </div>
</div>
<?php $this->end(); ?>
