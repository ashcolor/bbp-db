<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('imports')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();

        $this->table('musics')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('genre', 'string', [
                'comment' => 'ジャンル',
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('url', 'string', [
                'comment' => 'url',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'comment' => '曲名',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('artist', 'string', [
                'comment' => 'アーティスト',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('contributor', 'string', [
                'comment' => '投稿者',
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('part', 'tinyinteger', [
                'comment' => 'パート数',
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('time', 'time', [
                'comment' => '時間',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('lyric', 'tinyinteger', [
                'comment' => '歌詞',
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('remarks', 'string', [
                'comment' => '備考',
                'default' => null,
                'limit' => 1000,
                'null' => true,
            ])
            ->addColumn('code', 'string', [
                'comment' => '作品コード',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('delivery_datetime', 'datetime', [
                'comment' => '配信日時',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('imports')->drop()->save();
        $this->table('musics')->drop()->save();
    }
}
