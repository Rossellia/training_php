<!-- File: /app/View/Items/edit.ctp -->



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->control('category_id');
            echo $this->Form->control('title');
            echo $this->Form->control('year');
            echo $this->Form->control('length');
            echo $this->Form->control('description', array('rows' => '5'));
            echo $this->Form->control('id', array('type' => 'hidden'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>