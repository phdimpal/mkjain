<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Achievements Model
 *
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\Achievement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Achievement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Achievement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Achievement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Achievement|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Achievement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Achievement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Achievement findOrCreate($search, callable $callback = null, $options = [])
 */
class AchievementsTable extends Table
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

        $this->setTable('achievements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Registrations', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
		
		$this->hasMany('AchievementRows', [
            'foreignKey' => 'achievement_id',
            'joinType' => 'INNER'
        ]);
		
		$this->belongsTo('MasterYears');
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
            ->scalar('achivement_year')
            ->maxLength('achivement_year', 50)
            ->requirePresence('achivement_year', 'create')
            ->notEmpty('achivement_year');

        $validator
            ->scalar('achivement')
            ->requirePresence('achivement', 'create')
            ->notEmpty('achivement');

        $validator
            ->scalar('achivement_rank')
            ->maxLength('achivement_rank', 150)
            ->requirePresence('achivement_rank', 'create')
            ->notEmpty('achivement_rank');

        $validator
            ->date('achivement_date')
            ->requirePresence('achivement_date', 'create')
            ->notEmpty('achivement_date');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->dateTime('updated_on')
            ->requirePresence('updated_on', 'create')
            ->notEmpty('updated_on');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('edited_by')
            ->requirePresence('edited_by', 'create')
            ->notEmpty('edited_by');

        $validator
            ->allowEmpty('is_deleted'); */

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
        $rules->add($rules->existsIn(['student_id'], 'Registrations'));

        return $rules;
    }
}
