<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Syllabuses Model
 *
 * @property \App\Model\Table\MasterClassesTable|\Cake\ORM\Association\BelongsTo $MasterClasses
 * @property \App\Model\Table\MasterSectionsTable|\Cake\ORM\Association\BelongsTo $MasterSections
 * @property \App\Model\Table\MasterSubjectsTable|\Cake\ORM\Association\BelongsTo $MasterSubjects
 *
 * @method \App\Model\Entity\Syllabus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Syllabus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Syllabus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Syllabus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Syllabus|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Syllabus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Syllabus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Syllabus findOrCreate($search, callable $callback = null, $options = [])
 */
class SyllabusesTable extends Table
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

        $this->setTable('syllabuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
		 $this->belongsTo('ClassSectionMappings');
		 $this->belongsTo('Registrations');
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
            ->scalar('syllabus_file')
            ->maxLength('syllabus_file', 500)
            ->requirePresence('syllabus_file', 'create')
            ->notEmpty('syllabus_file');

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
        $rules->add($rules->existsIn(['master_class_id'], 'MasterClasses'));
        $rules->add($rules->existsIn(['master_section_id'], 'MasterSections'));
        $rules->add($rules->existsIn(['master_subject_id'], 'MasterSubjects'));

        return $rules;
    }
}
