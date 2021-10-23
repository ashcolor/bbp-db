<div class="paginator" style="text-align: center;">
    <ul class="pagination pagination-sm">
        <?= $this->Paginator->first('<<') ?>
        <?= $this->Paginator->prev('<') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('>') ?>
        <?= $this->Paginator->last('>>') ?>
    </ul>
    <p><?= $this->Paginator->counter('pages', ['format' => __('全{{count}}件 ({{page}} / {{pages}})')]) ?></p>
</div>