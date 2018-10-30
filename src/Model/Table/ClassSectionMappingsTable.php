<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClassSectionMappings Model
 *
 * @property \App\Model\Table\MasterClassesTable|\Cake\ORM\Association\BelongsTo $MasterClasses
 * @property \App\Model\Table\MasterSectionsTable|\Cake\ORM\Association\BelongsTo $MasterSections
 * @property \App\Model\Table\MasterSubjectsTable|\Cake\ORM\Association\BelongsTo $MasterSubjects
 * @property \App\Model\Table\MasterMediaTable|\Cake\ORM\Association\BelongsTo $MasterMedia
 *
 * @method \App\Model\Entity\ClassSectionMapping get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClassSectionMapping newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClassSectionMapping[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClassSectionMapping|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClassSectionMapping|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClassSectionMapping patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClassSectionMapping[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClassSectionMapping findOrCreate($search, callable $callback = null, $options = [])
 */
class ClassSectionMappingsTable extends Table
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

        $this->setTable('class_section_mappings');
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
        $this->belongsTo('MasterMedia', [
            'foreignKey' => 'master_medium_id',
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
        $rules->add($rules->existsIn(['master_class_id'], 'MasterClasses'));
        $rules->add($rules->existsIn(['master_section_id'], 'MasterSections'));
        $rules->add($rules->existsIn(['master_subject_id'], 'MasterSubjects'));
        $rules->add($rules->existsIn(['master_medium_id'], 'MasterMedia'));

        return $rules;
    }
}
