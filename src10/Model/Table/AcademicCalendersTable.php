<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AcademicCalenders Model
 *
 * @property \App\Model\Table\MasterCategoriesTable|\Cake\ORM\Association\BelongsTo $MasterCategories
 *
 * @method \App\Model\Entity\AcademicCalender get($primaryKey, $options = [])
 * @method \App\Model\Entity\AcademicCalender newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AcademicCalender[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AcademicCalender|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AcademicCalender|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AcademicCalender patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AcademicCalender[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AcademicCalender findOrCreate($search, callable $callback = null, $options = [])
 */
class AcademicCalendersTable extends Table
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

        $this->setTable('academic_calenders');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterCategories', [
            'foreignKey' => 'master_category_id',
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

        /* $validator
            ->scalar('title')
            ->maxLength('title', 200)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->date('calender_date')
            ->requirePresence('calender_date', 'create')
            ->notEmpty('calender_date');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->dateTime('updated_on')
            ->requirePresence('updated_on', 'create')
            ->notEmpty('updated_on'); */

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
        $rules->add($rules->existsIn(['master_category_id'], 'MasterCategories'));

        return $rules;
    }
}
