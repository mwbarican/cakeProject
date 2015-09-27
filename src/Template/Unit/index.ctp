<div class="unit panel">
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" class="table table-hover" id="unit-table">
			<thead>
				<tr>
					<?= $this->Html->tableHeaders([
						'ID',
						'Code / Abbreviation',
						'Name',
						'Description',
						'Used For',
						'Actions'])?>
				</tr>
			</thead>
		</table>
	</div>
</div>


<!---->
<script>
	$.fn.editable.defaults.mode = 'inline';
    var u_table = $("#unit-table").DataTable({
		processing : true,
		ajax : "<?= $this->Url->build(['controller'=>'unit','action'=>'content'])?>",
        columns : [
			{ data : 'id'},
			{ data : 'code',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'unit','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'code', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'name',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'unit','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'name', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'description',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'unit','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'textarea',
						name : 'description', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				},
				orderable : false,
				searchable : false},
			{ data : 'unit_type.name',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'unit','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'select',
						name : 'unit_type_id',
						source : <?= json_encode($type)?>,
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				},
				orderable : false,
				searchable : false},
			{ data : null,
				render : function(data, type, full, meta){
					var edit = "<?= $this->Url->build(['controller'=>'unit','action'=>'edit'])?>/";
					var remove = "<?= $this->Url->build(['controller'=>'unit','action'=>'delete'])?>/" + full.id;
					var content = "<a href='" + edit+full.id+"/1" + "' class='m-r-15 fa fa-pencil btn-edit'></a>" +
									"<a href='" + remove + "' class='text-danger fa fa-trash-o btn-delete'></a>";
					return content;
				},
				orderable:false,
				searchable: false}],
        
    });
	setInterval( function () {
		u_table.ajax.reload();
	}, 50000 );

	u_table.on("click","a.btn-edit",function(e){
		$('#modal').find('.modal-content').load($(this).attr('href'));
        $('#modal').modal('show');
		return false;
	});
	u_table.on("click","a.btn-delete",function(e){
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
</script>