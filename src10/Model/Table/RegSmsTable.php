<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegSms Model
 *
 * @method \App\Model\Entity\RegSm get($primaryKey, $options = [])
 * @method \App\Model\Entity\RegSm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RegSm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegSm|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegSm|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegSm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RegSm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegSm findOrCreate($search, callable $callback = null, $options = [])
 */
class RegSmsTable extends Table
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

        $this->setTable('reg_sms');
        $this->setDisplayField('name');
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
            ->integer('roll_no')
            ->requirePresence('roll_no', 'create')
            ->notEmpty('roll_no');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('father_mobile_no')
            ->maxLength('father_mobile_no', 100)
            ->requirePresence('father_mobile_no', 'create')
            ->notEmpty('father_mobile_no');

        $validator
            ->scalar('student_mobile_no')
            ->maxLength('student_mobile_no', 100)
            ->requirePresence('student_mobile_no', 'create')
            ->notEmpty('student_mobile_no');

        return $validator;
    }
}
