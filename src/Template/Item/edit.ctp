<?php
$templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($templates);
$off = "style='display:none'";
if($modal)
{
	$this->set('title','Modify(Product) : ' . $item->code);
	$off = '';
}
?>
<div class="item panel">
	<?php
		if(!$modal)
		{	
			$redir = $this->Url->build(['controller' => 'item','action' => 'index']);
			
			echo '<div class="panel-heading">
					<div class="panel-title">
						<h2>Product</h2>
					</div>
					<div class="btn-group pull-right">
						<a class="btn btn-primary m-t-20" href=" ' . $redir . '">
							<span><i class="fa fa-list"></i></span>
						</a>
					</div>
				</div>';
		}	
	?>
	<div class="panel-body">
		<?= $this->Form->create($item,['role'=>'form','id'=>'item-edit-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-4">
					<?= $this->Form->input('code',
						['class' => 'form-control',
						'placeholder' => 'ex. IT-000',
						'label' => 'Item Code']) ?>
				</div>
				<div class="col-md-8">
					<?= $this->Form->input('name',
						['class' => 'form-control',
						'placeholder' => 'Here, You put the name of the product',
						'label' => 'Item Name'])?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?= $this->Form->input('category_id', 
						['class' => 'form-control select-category',
						'options' => $itemCategory, 
						'empty' => true])?>
				</div>
				<div class="col-md-6">
					<?= $this->Form->input('item_type_id', 
						['class' => 'form-control select',
						'options' => $itemType])?>
				</div>
			</div>
			<div class="row">
				<?= $this->Form->input('supplier._ids', 
					['class' => 'form-control select',
					'options' => $supplier])?>
			</div>
			<div class="row">
				<?= $this->Form->input('description',
					['class'=> 'form-control',
					'placeholder' => 'additional information on the product can be defined here.',
					'label' => 'Description'])?>
			</div>
			<div class="row">
				<span id="pane-message" class="pull-right"></span>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),[
					'class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),[
					'class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

<script>
	$(".select").select2();
	$(".select-category").select2({
		placeholder : "Select category",
	});
	$("#item-edit-form").submit(function(e){
		var form_data = $("#item-edit-form").serialize();
		$.ajax({
			type : "POST",
			url : "<?= $this->Url->build(['controller'=>'item','action'=>'edit',$item->id])?>",
			data : form_data,
			dataType : "json",
			success : function(result)
			{
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					if($("#many").is(':checked'))
					{
						setTimeout(function()
						{
							$('#pane-message').fadeOut('slow');
							$("#item-form").trigger("reset");
						}, 2000);
					}
					else
					{
						setTimeout(function()
						{
							$('#pane-message').fadeOut('slow');
							$("#item-form").trigger("reset");
							$('.modal').modal('hide');
						}, 2000);
					}
					
				}
				else
				{
					$("#pane-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			}
		});
		return false;
	});
</script>

