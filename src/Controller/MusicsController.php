<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use PhpQuery;

/**
 * Musics Controller
 *
 * @property \App\Model\Table\MusicsTable $Musics
 *
 * @method \App\Model\Entity\Music[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MusicsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'musics' => [
                'order' => [
                    'Musics.id' => 'desc',
                ],
            ],
        ];

        $query = $this->Musics->find('all');

        $search = ['name', 'artist', 'contributor', 'remarks'];
        for ($i = 0; $i < count($search); $i++) {
            $att = $search[$i];
            if (!empty($$att = $this->getRequest()->getQuery($search[$i]))) {
                $words = preg_split('/ |　|,/', $$att);
                $and = [];
                foreach ($words as $w) {
                    $w = trim($w);
                    if (empty($w)) {
                        continue;
                    }
                    $and[] = [$search[$i] . ' collate utf8_unicode_ci LIKE' => "%{$w}%"];
                }
                if (count($and)) {
                    $query->where([
                        'AND' => $and
                    ]);
                }
            }
        }

        $musics = $this->paginate($query,[
            'order' => [
                'Musics.id' => 'desc',
            ]
        ]);

        $this->set(compact('musics', 'name', 'artist', 'contributor', 'remarks'));
    }
}
