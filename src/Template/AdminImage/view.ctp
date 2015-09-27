<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Admin Image'), ['action' => 'edit', $adminImage->admin_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Admin Image'), ['action' => 'delete', $adminImage->admin_id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminImage->admin_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Admin Image'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admin'), ['controller' => 'Admin', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admin', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="adminImage view large-10 medium-9 columns">
    <h2><?= h($adminImage->admin_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Admin') ?></h6>
            <p><?= $adminImage->has('admin') ? $this->Html->link($adminImage->admin->id, ['controller' => 'Admin', 'action' => 'view', $adminImage->admin->id]) : '' ?></p>
            <h6 class="subheader"><?= __('File Directory') ?></h6>
            <p><?= h($adminImage->file_directory) ?></p>
            <h6 class="subheader"><?= __('File Size') ?></h6>
            <p><?= h($adminImage->file_size) ?></p>
            <h6 class="subheader"><?= __('File Path') ?></h6>
            <p><?= h($adminImage->file_path) ?></p>
            <h6 class="subheader"><?= __('File Name') ?></h6>
            <p><?= h($adminImage->file_name) ?></p>
            <h6 class="subheader"><?= __('File Type') ?></h6>
            <p><?= h($adminImage->file_type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($adminImage->id) ?></p>
        </div>
    </div>
</div>
