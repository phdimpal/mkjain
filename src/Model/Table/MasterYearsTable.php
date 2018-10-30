<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterYears Model
 *
 * @method \App\Model\Entity\MasterYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterYear newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterYear|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterYear|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterYear[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterYear findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterYearsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('master_years');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('year_name')
            ->maxLength('year_name', 15)
            ->requirePresence('year_name', 'create')
            ->notEmpty('year_name');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
