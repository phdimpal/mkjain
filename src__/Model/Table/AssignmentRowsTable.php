<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AssignmentRows Model
 *
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\BelongsTo $Registrations
 * @property \App\Model\Table\AssignmentsTable|\Cake\ORM\Association\BelongsTo $Assignments
 *
 * @method \App\Model\Entity\AssignmentRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\AssignmentRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AssignmentRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AssignmentRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AssignmentRow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AssignmentRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AssignmentRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AssignmentRow findOrCreate($search, callable $callback = null, $options = [])
 */
class AssignmentRowsTable extends Table
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

        $this->setTable('assignment_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Registrations', [
            'foreignKey' => 'registration_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Assignments', [
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
        $rules->add($rules->existsIn(['registration_id'], 'Registrations'));
        $rules->add($rules->existsIn(['assignment_id'], 'Assignments'));

        return $rules;
    }
}
