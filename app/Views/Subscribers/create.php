<?php $this->setSiteTitle('Subscriber'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="card">
    <div class="card-header">
        <span class="login100-form-title">
            Add Subscriber
        </span>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group input-group mr">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input class="form-control" id='email' name='email' placeholder="email" type="email" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input class="form-control" id='name' name='name' placeholder="Username" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input class="form-control" id='category' name='category' placeholder="Category" type="text" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block"> Create Account </button>
            </div>
        </form>
        <?php
        if (!empty($this->displayErrors)) {
            echo '<div class="alert alert-warning" style="height:45px" role="alert">';
            echo $this->displayErrors;
            echo '</div>';
        } ?>
    </div>
</div>
<?php $this->end(); ?>