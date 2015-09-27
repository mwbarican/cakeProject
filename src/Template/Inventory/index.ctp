<div class="inventory panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Inventory</h1>
		</div>
		<div class="control pull-right">
			<!--<nav>
				<button id="adjust-item" class="btn btn-primary m-t-20 btn-animated from-top fa fa-sliders" data-toggle="modal" data-target="#modal">
					<span>Adjust</span>
				</button>
			</nav>-->
		</div>
	</div>
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" class="table table-hover">
		<thead>
			<tr>
				<?= $this->Html->tableHeaders([
					'Item Code',
					'Item Name',
					'Quantity',
					'Unit',
					'Actions'])?>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($inventory as $inventory): ?>
			<tr>
				<td><?= $inventory->item->code ?></td>
				<td><?= $inventory->item->name ?></td>
				<td><?= $this->Number->format($inventory->quantity) ?></td>
				<td><?= $inventory->item['unit']['code'] ?></td>
				<td class="actions">
					<?= $this->Html->link(__(''), ['controller'=>'inventory','action' => 'adjust', $inventory->item->id,true], 
						['class' => 'fa fa-sliders btn-adjust']) ?>
				</td>
			</tr>

		<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>

<!---->

<script>
	$(".table").DataTable({
		columns : [null,null,null,null,{orderable: false,searchable: false}],
		scrollX: true
	});
	$('.btn-adjust').click(function(e){
            $('#modal').find('.modal-content').load($(this).attr('href'));
            $('#modal').modal('show');
            return false;
    });
	$('#adjust-item').click(function(){
		 $('#modal').find('.modal-content').load('<?= $this->Url->build(['controller'=>'inventory','action' => 'adjust', 0,true])?>');
	});
</script>
