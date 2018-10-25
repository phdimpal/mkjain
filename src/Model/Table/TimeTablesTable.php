<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeTables Model
 *
 * @property \App\Model\Table\MasterRolesTable|\Cake\ORM\Association\BelongsTo $MasterRoles
 * @property \App\Model\Table\MasterClassesTable|\Cake\ORM\Association\BelongsTo $MasterClasses
 * @property \App\Model\Table\MasterSectionsTable|\Cake\ORM\Association\BelongsTo $MasterSections
 * @property \App\Model\Table\MasterSubjectsTable|\Cake\ORM\Association\BelongsTo $MasterSubjects
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\BelongsTo $Registrations
 *
 * @method \App\Model\Entity\TimeTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeTable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTable|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTable findOrCreate($search, callable $callback = null, $options = [])
 */
class TimeTablesTable extends Table
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

        $this->setTable('time_tables');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterRoles', [
            'foreignKey' => 'master_role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MasterClasses', [
            'foreignKey' => 'master_class_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MasterSections', [
            'foreignKey' => 'master_section_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MasterSubjects', [
            'foreignKey' => 'master_subject_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Registrations', [
            'foreignKey' => 'registration_id',
            'joinType' => 'INNER'
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
            ->scalar('week_name')
            ->maxLength('week_name', 25)
            ->requirePresence('week_name', 'create')
            ->notEmpty('week_name');

        $validator
            ->time('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmpty('start_time');

        $validator
            ->time('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmpty('end_time');

        $validator
            ->integer('number_of_minute')
            ->requirePresence('number_of_minute', 'create')
            ->notEmpty('number_of_minute');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->dateTime('updated_on')
            ->requirePresence('updated_on', 'create')
            ->notEmpty('updated_on');

        $validator
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['master_role_id'], 'MasterRoles'));
        $rules->add($rules->existsIn(['master_class_id'], 'MasterClasses'));
        $rules->add($rules->existsIn(['master_section_id'], 'MasterSections'));
        $rules->add($rules->existsIn(['master_subject_id'], 'MasterSubjects'));
        $rules->add($rules->existsIn(['registration_id'], 'Registrations'));

        return $rules;
    }
}
