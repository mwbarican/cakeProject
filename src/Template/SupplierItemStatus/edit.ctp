<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplierItemStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItemStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supplier Item Status'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="supplierItemStatus form large-10 medium-9 columns">
    <?= $this->Form->create($supplierItemStatus) ?>
    <fieldset>
        <legend><?= __('Edit Supplier Item Status') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
