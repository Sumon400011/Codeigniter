<div class="container">
   <div class="row">
      <div class="col-md-6 offset-md-3">
            <div class="card">
               <div class="card-header">
                  Login Form
               </div>
               <div class="card-body">
               <?php 
                     if ($this->session->flashdata('message')) {
                        echo '
                           <div class="alert font-small alert-warning alert-dismissible fade show" role="alert">
                              '.$this->session->flashdata("message").'
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>';
                     }
               ?>
                     <form class="form-horizontal" method="POST" action="<?= base_url('Login_Validation'); ?>"> <!-- Register/login_validation -->

                     <!-- Text input-->
                     <div class="form-group">
                        <input id="user_email" name="user_email" type="email" placeholder="Email" class="font-small form-control" required="required" >
                        <small class="text-danger"><?= form_error('user_email'); ?></small>
                     </div>

                     <!-- pass input-->
                     <div class="form-group">
                        <input id="user_pass" name="user_pass" type="password" placeholder="Password" class="form-control font-small" required="required" >
                        <small class="text-danger"><?= form_error('user_pass'); ?></small>
                     </div>

                     <!-- Confirm pass input-->
                     <div class="form-group mb-0">
                        <button type="submit" class="btn btn-sm btn-primary">submit</button>
                     </div>

                  </form>
               </div>
            </div>

         
      </div>
   </div>
</div>