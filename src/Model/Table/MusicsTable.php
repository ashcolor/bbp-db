<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Musics Model
 *
 * @method \App\Model\Entity\Music get($primaryKey, $options = [])
 * @method \App\Model\Entity\Music newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Music[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Music|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Music|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Music patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Music[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Music findOrCreate($search, callable $callback = null, $options = [])
 */
class MusicsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->setTable('musics');
        $this->setDisplayField('name');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->nonNegativeInteger('no')
            ->requirePresence('no', 'create')
            ->notEmpty('no');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 10)
            ->allowEmpty('genre');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('artist')
            ->maxLength('artist', 100)
            ->allowEmpty('artist');

        $validator
            ->scalar('contributor')
            ->maxLength('contributor', 20)
            ->allowEmpty('contributor');

        $validator
            ->time('time')
            ->allowEmpty('time');

        $validator
            ->allowEmpty('part');

        $validator
            ->boolean('lyric')
            ->allowEmpty('lyric');

        $validator
            ->scalar('remarks')
            ->maxLength('remarks', 1000)
            ->allowEmpty('remarks');

        $validator
            ->scalar('code')
            ->maxLength('code', 100)
            ->allowEmpty('code');

        $validator
            ->dateTime('delivery_datetime')
            ->allowEmpty('delivery_datetime');

        return $validator;
    }
}
