<style>
.login-page, .register-page{
background-color:#fff ;	
}
</style>

<div class="login-box" style="margin: 3% auto;">
  <div class="login-logo" style="margin-bottom: 6px;">
   <?= $this->Html->image('/dist/img/logo.jpg',['class'=>'user-image','alt'=>'User Image','style'=>'height:130px; width:130px;']);?>
   <br/><a href="#" style="color:#666;font-size:25px;"><b>MK JAIN </b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color:#f1f1f194;font-size: 16px;">
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