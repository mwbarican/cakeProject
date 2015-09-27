<div class="adminImage form large-10 medium-9 columns">
    <?= $this->Form->create(null, ['type' => 'file','class'=>'dropzone','id'=>'dz-imageuploader']) ?>
		<div class="fallback">
			<input type="file" name="file" multiple />
		</div>
    <?= $this->Form->end() ?>
</div>

<script>

	Dropzone.options.dzImageuploader.url = "modified/url";
</script>