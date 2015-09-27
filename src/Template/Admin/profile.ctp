<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$this->Form->templates($new_templates);
?>
<div class="admin panel">
	<div class="panel-body">
		<?= $this->Form->create($admin, ['role'=>'form']) ?>
		<fieldset>
			<legend><?= __('Add Admin') ?></legend>
			<div>
				<div class="col-md-6"><?=  $this->Form->input('username',['class'=>'form-control']) ?></div>
				<div class="col-md-6"><?=  $this->Form->input('password',['class'=>'form-control']) ?></div>
			</div>
			<div>
				<div class="col-md-6"><?=  $this->Form->input('admin_profile.firstname',['class'=>'form-control']) ?></div>
				<div class="col-md-6"><?=  $this->Form->input('admin_profile.lastname',['class'=>'form-control']) ?></div>
			</div>
			<div class="col-md-6"><?=  $this->Form->input('admin_profile.email',['class'=>'form-control']) ?></div>
			<div class="col-md-6">
				<div class="col-md-6"><?=  $this->Form->input('designation_id', ['options' => $designation,'class'=>'form-control']) ?></div>
			</div>
		</fieldset>
		<?= $this->Form->button(__('<span>Clear</span>'),[
			'class' => 'btn btn-animated from-top fa fa-remove pull-right',
			'type' => 'reset']) ?>
		<?= $this->Form->button(__('<span>Save</span>'),[
			'class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
			'type' => 'submit']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
