<?php
use Migrations\AbstractSeed;

/**
 * Init seed.
 */
class InitSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        //データを登録したい順番でテーブル名を記載する
        $sortedTableName = [
            'musics',
            'imports',
        ];

        $this->execute('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($sortedTableName as $tableName) {
            $this->table($tableName)->truncate();
            $camelTabeName = $this->__camelize($tableName);
            $this->call("{$camelTabeName}Seed");
        }

        $this->execute('SET FOREIGN_KEY_CHECKS = 1');
    }

    private function __camelize($str) {
        $str = ucwords($str, '_');
        return str_replace('_', '', $str);
    }

}
