<?php
$direction = @$_GET['direction'];
if ($direction == 'asc') {
    $direction = 'mdl-data-table__header--sorted-ascending';
} elseif ($direction == 'desc') {
    $direction = 'mdl-data-table__header--sorted-descending';
}
$sort = @$_GET['sort'];
?>
    <form>
        <table class="search-table mdl-data-table mdl-js-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th scope="col" style="">楽曲名</th>
                <td><input class="mdl-textfield__input" type="text" name="name" value="<?= $name; ?>"
                           placeholder="楽曲名で検索"></td>
                <th scope="col">アーティスト</th>
                <td><input class="mdl-textfield__input" type="text" name="artist" value="<?= $artist; ?>"
                           placeholder="アーティストで検索"></td>
                <th scope="col">投稿者</th>
                <td><input class="mdl-textfield__input" type="text" name="contributor" value="<?= $contributor; ?>"
                           placeholder="投稿者で検索"></td>
                <th scope="col">備考</th>
                <td><input class="mdl-textfield__input" type="text" name="remarks" value="<?= $remarks; ?>"
                           placeholder="備考で検索"></td>
            </tr>
            </thead>
        </table>
        <div class="search-button">
            <button type="reset" class="mdl-button mdl-js-button mdl-button--raised">
                リセット
            </button>
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                検索
            </button>
        </div>
    </form>
<?= $this->element('paginate'); ?>
    <table id="music_list" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin: 0 auto">
        <thead>
        <tr>
            <th scope="col" style="width: 120px"><?= $this->Paginator->sort('delivery_datetime', '配信日') ?></th>
            <th scope="col" style="width: 60px">試聴</th>
            <th scope="col" style="width: 30%"><?= $this->Paginator->sort('name', '楽曲名') ?></th>
            <th scope="col" style="width: 160px"><?= $this->Paginator->sort('artist', 'アーティスト') ?></th>
            <th scope="col" style="width: 120px"><?= $this->Paginator->sort('contributor', '投稿者') ?></th>
            <th scope="col" style="width: 80px"><?= $this->Paginator->sort('time', '時間') ?></th>
            <th scope="col" style="width: 60px"><?= $this->Paginator->sort('part', 'P') ?></th>
            <th scope="col" style="width: 40%"><?= $this->Paginator->sort('remarks', '備考') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($musics as $music): ?>
            <tr>
                <td style="text-align: center"><?= date('Y/m/d', strtotime($music->delivery_datetime)) ?></td>
                <td style="text-align: center">
                    <?php if (!empty($music->url)): ?>
                        <a href="<?= $music->url; ?>">
                        <i class="material-icons">play_circle_outline</i>
                        </a>
                    <?php endif; ?>
                </td>
                <td class="mdl-data-table__cell--non-numeric">

                        <?= h($music->name) ?>

                </td>
                <td class="mdl-data-table__cell--non-numeric"><?= h($music->artist) ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= h($music->contributor) ?></td>
                <td style="text-align: center"><?= date('H:i', strtotime($music->time)) ?></td>
                <td style="text-align: center"><?= ($music->part == 0) ? '' : $music->part ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= h($music->remarks) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->element('paginate'); ?>