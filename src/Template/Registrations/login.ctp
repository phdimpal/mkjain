<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>MK</b>JAIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
 <?= $this->Flash->render() ?>
   <?= $this->Form->create() ?>
      <div class="form-group has-feedback">
        <?= $this->Form->input('username',['class'=>'form-control','placeholder'=>'UserName','label'=>false,'required']) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        
		<?= $this->Form->input('password',['class'=>'form-control','placeholder'=>'Password','label'=>false,'required']) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
         <a href="#">I forgot my password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
         
		  <?= $this->Form->button(__('Sign In'),['class'=>'btn btn-primary btn-block btn-flat']); ?>
        </div>
        <!-- /.col -->
      </div>
   <?= $this->Form->end() ?>

    
   
  </div>
  <!-- /.login-box-body -->
</div>