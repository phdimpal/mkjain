<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterSubjects Model
 *
 * @property \App\Model\Table\SyllabusesTable|\Cake\ORM\Association\HasMany $Syllabuses
 *
 * @method \App\Model\Entity\MasterSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterSubject|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterSubjectsTable extends Table
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

        $this->setTable('master_subjects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Syllabuses', [
            'foreignKey' => 'master_subject_id'
        ]);
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
            ->scalar('subject_name')
            ->maxLength('subject_name', 50)
            ->requirePresence('subject_name', 'create')
            ->notEmpty('subject_name');

        $validator
            ->integer('flag')
            ->requirePresence('flag', 'create')
            ->notEmpty('flag');

        return $validator;
    }
}
