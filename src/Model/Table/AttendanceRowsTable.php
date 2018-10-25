<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttendanceRows Model
 *
 * @property \App\Model\Table\AttendancesTable|\Cake\ORM\Association\BelongsTo $Attendances
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\AttendanceRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttendanceRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttendanceRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttendanceRow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttendanceRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRow findOrCreate($search, callable $callback = null, $options = [])
 */
class AttendanceRowsTable extends Table
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

        $this->setTable('attendance_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Attendances', [
            'foreignKey' => 'attendance_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
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
            ->scalar('attendance_mark')
            ->maxLength('attendance_mark', 20)
            ->requirePresence('attendance_mark', 'create')
            ->notEmpty('attendance_mark');

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
        $rules->add($rules->existsIn(['attendance_id'], 'Attendances'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));

        return $rules;
    }
}
