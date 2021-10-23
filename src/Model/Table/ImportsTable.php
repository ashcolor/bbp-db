<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imports Model
 *
 * @method \App\Model\Entity\Import get($primaryKey, $options = [])
 * @method \App\Model\Entity\Import newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Import[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Import|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Import|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Import patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Import[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Import findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImportsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('imports');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function saveImport($status = '', $url = ''){
        $import = $this->newEntity();
        $import['status'] = $status;
        $import['url'] = $url;
        $this->save($import);
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('status')
            ->maxLength('status', 10);

        $validator
            ->scalar('url')
            ->maxLength('url', 100);

        return $validator;
    }
}
