<div class="container">
   <div class="row">
      <div class="col-md-8 offset-md-2">
         <div class="card">
            <div class="card-header">
               Signup Form
            </div>
            <div class="card-body">
               <?php 
                  if($this->session->flashdata('message')){
                     echo '
                        <div class="alert font-small alert-warning alert-dismissible fade show" role="alert">
                           '.$this->session->flashdata("message").'
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>';
                  }
               ?>
                  <form class="form-horizontal" method="POST" action="<?= base_url();?>register/validation">

                     <!-- Text input-->
                     <div class="form-group">
                        <input id="user_name" name="user_name" type="text" placeholder="Full name" class="form-control font-small" required="required" value="<?= set_value('user_name'); ?>">
                        <small class="text-danger"><?= form_error('user_name'); ?></small>
                     </div>

                     <!-- Text input-->
                     <div class="form-group">
                        <input id="user_email" name="user_email" type="email" placeholder="Email" class="font-small form-control" required="required" value="<?= set_value('user_email'); ?>" >
                        <small class="text-danger"><?= form_error('user_email'); ?></small>
                     </div>

                     <!-- pass input-->
                     <div class="form-group">
                        <input id="user_pass" name="user_pass" type="password" placeholder="Password" class="font-small form-control" required="required" value="<?= set_value('user_pass'); ?>" >
                        <small class="text-danger"><?= form_error('user_pass'); ?></small>
                     </div>

                     <!-- Confirm pass input-->
                     <div class="form-group">
                        <input id="con_pass" name="con_pass" type="password" placeholder="Confirm Password" class="font-small form-control" required="required" value="<?= set_value('con_pass'); ?>">
                        <small class="text-danger"><?= form_error('con_pass'); ?></small>
                     </div>


                     <!-- Confirm pass input-->
                     <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">submit</button>
                     </div>

                  </form>
            </div>
         </div>
         
      </div>
   </div>
</div>


