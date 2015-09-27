<div class="item panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Products</h1>
		</div>
		<div class="control pull-right">
			<nav>
				<button id="btn-new" class="btn btn-primary m-t-20 btn-animated from-top fa fa-plus-square" data-toggle="modal" data-target="#modal">
					<span>New</span>
				</button>
			</nav>
		</div>
	</div>
	<div class="panel-body">
	    <table cellpadding="0" cellspacing="0" class="table table-hover">
		<thead>
			<tr>
				<?= $this->Html->tableHeaders([
					'Item Code',
					'Name',
					'Category',
					'Type',
					'Description',
					'Actions'])?>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($item as $item): ?>
			<tr>
				<td><?= $this->Html->link(__($item->code),'#',
					['class' => 'text-editable',
					'data-pk' => $this->Number->format($item->id),
					'data-name'=>'code']) ?></td>
				<td><?= $this->Html->link(__($item->name),'#',
					['class' => 'text-editable',
					'data-pk' => $this->Number->format($item->id),
					'data-name'=>'name']) ?></td>
				<td><?= $this->Html->link(isset($item->item_category->name) ? $item->item_category->name : "",'#',
					['class' => 'category-editable', 
					'data-pk' => $this->Number->format($item->id),
					'data-value' => $this->Number->format(isset($item->item_category->id) ? $item->item_category->id : "none"),
					'data-name'=>'category_id']) ?>
				</td>
				<td><?= $this->Html->link(__($item->item_type->name),'#',
					['class' => 'type-editable', 
					'data-pk' => $this->Number->format($item->id),
					'data-value' => $this->Number->format(__($item->item_type->id)),
					'data-name'=>'item_type_id']) ?></td>
				<td><?= $this->Html->link(__($item->description),'#',
					['class' => 'textarea-editable', 
					'data-pk' => $this->Number->format($item->id),
					'data-name'=>'description']) ?></td>
				<td class="actions">
					<?= $this->Html->link(__(''), ['controller'=>'item','action' => 'edit', $item->id,true],
						['class'=> 'm-r-15 fa fa-pencil btn-edit']) ?>
					<?= $this->Html->link(__(''), ['controller'=>'item','action' => 'delete', $item->id], 
						['class' => 'text-danger fa fa-trash-o btn-delete']) ?>
				</td>
			</tr>

		<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>

<script>
	$(".table").DataTable({
		columns : [null,null,null,null,null,{orderable: false,searchable: false}],
		scrollX: true
	});
	$("#btn-new").click(function() 
	{
		$("#modal").find(".modal-dialog").addClass("modal-lg");
		$("#modal").find(".modal-content").load('<?= $this->Url->build(["controller"=>"item","action"=>"add",true]) ?>');
	});
	$.fn.editable.defaults.mode = 'inline';
	$(".text-editable").editable({
		type : 'text',
		url : '<?= $this->Url->build(["controller"=>"item","action"=>"edit"])?>',
		ajaxOptions: 
		{
			dataType: 'json'
		},
		success: function(result,value)
		{
			if(result.status == 'error')
			{
				return result.message;
			}
			else
			{
				//$('.designation').load(' <?= $this->Url->build(["controller" => "designation","action" => "index"])?> ');
			}
		},
		error: function(xhr,data) {
			return "error has occured";
		}
	});
	$(".textarea-editable").editable({
		type : 'textarea',
		url : '<?= $this->Url->build(["controller"=>"item","action"=>"edit"])?>',
		ajaxOptions: 
		{
			dataType: 'json'
		},
		success: function(result,value)
		{
			if(result.status == 'error')
			{
				return result.message;
			}
			else
			{
				//$('.designation').load(' <?= $this->Url->build(["controller" => "designation","action" => "index"])?> ');
			}
		},
		error: function(xhr,data) {
			return "error has occured";
		}
	});
	$(".category-editable").editable({
		type : 'select',
		url : '<?= $this->Url->build(["controller"=>"item","action"=>"edit"])?>',
		source : [ 
			<?php foreach ($categories as $category): ?> 
			{value : '<?= h($category->id)?>', text : '<?= h($category->name)?>'},
			<?php endforeach; ?>
			
		],
		ajaxOptions: 
		{
			dataType: 'json'
		},
		success: function(result,value)
		{
			if(result.status == 'error')
			{
				return result.message;
			}
			else
			{
				//$('.designation').load(' <?= $this->Url->build(["controller" => "designation","action" => "index"])?> ');
			}
		},
		error: function(xhr,data) {
			return "error has occured";
		}
	});
	$(".type-editable").editable({
		type : 'select',
		url : '<?= $this->Url->build(["controller"=>"item","action"=>"edit"])?>',
		source : [ 
			<?php foreach ($types as $type): ?> 
			{value : '<?= h($type->id)?>', text : '<?= h($type->name)?>'},
			<?php endforeach; ?>
			
		],
		ajaxOptions: 
		{
			dataType: 'json'
		},
		success: function(result,value)
		{
			if(result.status == 'error')
			{
				return result.message;
			}
			else
			{
				//$('.designation').load(' <?= $this->Url->build(["controller" => "designation","action" => "index"])?> ');
			}
		},
		error: function(xhr,data) {
			return "error has occured";
		}
	});
	$(".btn-delete").click(function(e){
        var result = confirm('Are you sure you want to delete this?');
        var row = $(this).parents('tr'); //get row
        $('.ajax_loader').show();
        $('#flashMessage').fadeOut();
        if(result)
        {
            $.ajax({
                type:"POST",
                url:$(this).attr('href'),
                dataType: "json",
                success:function(response){
                    // hide loading image
                    $('.ajax_loader').hide();
                    
                    // hide table row on success
                    if(response.success == true) {
                        row.fadeOut();
                    }
                    
                    // show respsonse message
                    if( response.message ) {
                        console.log(response.message);
                    } else {
                        $('#ajax_msg').html( "<p id='flashMessage' class='flash_bad'>An unexpected error has occured, please refresh and try again</p>" ).show();
                    }
                }
            });
            
        }
        return false;
    });
    $('.btn-edit').click(function(e){
		$('#modal').find(".modal-dialog").addClass("modal-lg");
        $('#modal').find('.modal-content').load($(this).attr('href'));
        $('#modal').modal('show');
        return false;
    });
</script>
