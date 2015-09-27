<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Supplier Item Status'), ['action' => 'edit', $supplierItemStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Item Status'), ['action' => 'delete', $supplierItemStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItemStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Item Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Item Status'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="supplierItemStatus view large-10 medium-9 columns">
    <h2><?= h($supplierItemStatus->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($supplierItemStatus->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($supplierItemStatus->id) ?></p>
        </div>
    </div>
</div>
