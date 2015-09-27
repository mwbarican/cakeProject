<?php
$templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($templates);
$this->set('title','Quantity Adjust');
?>
<div class="inventory panel">
	<div class="panel-body">
		<?= $this->Form->create($inventory,['role'=>'form','id'=>'adjust-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label class="font-montserrat">ITEM</label>
						<input class="form-control text-black" value="<?= $inventory->item->name ?>" readonly /> 
					</div>
					
					<?= $this->Form->input('item_id',
						['type' => 'hidden',
						'value' =>$inventory->item_id]) ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('quantity',
						['class'=>'form-control'])?>
				</div>
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label class="font-montserrat">UNIT</label>
						<input class="form-control text-black" value="<?= $item->unit['code'] ?>" readonly /> 
					</div>
				</div>
			</div>
			<div class="row">
				<span class="pull-right" id="pane-message"></span>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),
					['class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),
					['class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
    
</div>

<!---->
<script>
	$(".select").select2();
	$("#adjust-form").submit(function(){
		var form_data = $("#adjust-form").serialize();
		$.ajax({
			type : "POST",
			url : "<?= $this->Url->build(['controller'=>'inventory','action'=>'adjust',$inventory->item_id])?>",
			data : form_data,
			dataType : "json",
			success : function(result)
			{
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					setTimeout(function()
					{
						$('#pane-message').fadeOut('slow');
						$("#item-form").trigger("reset");
						$('.modal').modal('hide');
					}, 2000);
				}
				else
				{
					$("#pane-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			},
			error : function(xhr, ajaxOptions, thrownError)
			{
				$("#pane-message").html('<span class="text-danger">' + 'Error: Server may be Busy. please try again later' + '</span>');
			}
		});
		return false;
	});
</script>