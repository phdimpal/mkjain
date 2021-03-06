<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assignments Model
 *
 * @property \App\Model\Table\MasterRolesTable|\Cake\ORM\Association\BelongsTo $MasterRoles
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\MasterClassesTable|\Cake\ORM\Association\BelongsTo $MasterClasses
 * @property \App\Model\Table\MasterSectionsTable|\Cake\ORM\Association\BelongsTo $MasterSections
 * @property \App\Model\Table\MasterSubjectsTable|\Cake\ORM\Association\BelongsTo $MasterSubjects
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\BelongsTo $Registrations
 *
 * @method \App\Model\Entity\Assignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assignment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assignment findOrCreate($search, callable $callback = null, $options = [])
 */
class AssignmentsTable extends Table
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

        $this->setTable('assignments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterRoles', [
            'foreignKey' => 'master_role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Registrations', [
            'foreignKey' => 'student_id',
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
        $this->hasMany('AssignmentRows', [
            'foreignKey' => 'assignment_id',
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

       /*  $validator
            ->scalar('assignment_type')
            ->maxLength('assignment_type', 25)
            ->requirePresence('assignment_type', 'create')
            ->notEmpty('assignment_type');

        $validator
            ->scalar('topic')
            ->requirePresence('topic', 'create')
            ->notEmpty('topic');

        $validator
            ->date('assignment_date')
            ->requirePresence('assignment_date', 'create')
            ->notEmpty('assignment_date');

        $validator
            ->scalar('assignment_file')
            ->maxLength('assignment_file', 250)
            ->requirePresence('assignment_file', 'create')
            ->notEmpty('assignment_file');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('edited_by')
            ->requirePresence('edited_by', 'create')
            ->notEmpty('edited_by');

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
            ->notEmpty('is_deleted'); */

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
       // $rules->add($rules->existsIn(['student_id'], 'Registrations'));
        $rules->add($rules->existsIn(['master_class_id'], 'MasterClasses'));
        $rules->add($rules->existsIn(['master_section_id'], 'MasterSections'));
        $rules->add($rules->existsIn(['master_subject_id'], 'MasterSubjects'));
       // $rules->add($rules->existsIn(['registration_id'], 'Registrations'));

        return $rules;
    }
}
