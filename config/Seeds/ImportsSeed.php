<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Imports seed.
 */
class ImportsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '129',
                'title' => '2018-10-20 (土) 19:21:39 - アンケート',
            ],
        ];

        $table = $this->table('imports');
        $table->insert($data)->save();
    }
}
