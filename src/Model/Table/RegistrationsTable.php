<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registrations Model
 *
 * @property \App\Model\Table\MasterRolesTable|\Cake\ORM\Association\BelongsTo $MasterRoles
 * @property \App\Model\Table\MasterClassesTable|\Cake\ORM\Association\BelongsTo $MasterClasses
 * @property \App\Model\Table\MasterSectionsTable|\Cake\ORM\Association\BelongsTo $MasterSections
 * @property \App\Model\Table\MasterMediaTable|\Cake\ORM\Association\BelongsTo $MasterMedia
 *
 * @method \App\Model\Entity\Registration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Registration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Registration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registration|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Registration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registration findOrCreate($search, callable $callback = null, $options = [])
 */
class RegistrationsTable extends Table
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

        $this->setTable('registrations');
        $this->setDisplayField('name');
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
        $this->belongsTo('MasterMediums', [
            'foreignKey' => 'master_medium_id',
            'joinType' => 'INNER'
        ]);
		 $this->belongsTo('Syllabuses');
		 $this->belongsTo('GalleryMedias'); 
		 $this->belongsTo('Leaves');
		 $this->belongsTo('Galleries');
		 $this->belongsTo('News');
		 $this->belongsTo('Videoes');
		 $this->belongsTo('ComplainTypes');
		 $this->belongsTo('ClassSectionMappings');
<<<<<<< HEAD
		 $this->belongsTo('Complains');
		 $this->belongsTo('Achievements');
		 $this->belongsTo('Notifications');
		  $this->belongsTo('Assignments');
		 $this->belongsTo('MasterYears');
=======
>>>>>>> b133df2eb7812728bb0a7b686c89f18962879da4
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
            ->scalar('roll_no')
            ->maxLength('roll_no', 150)
            ->requirePresence('roll_no', 'create')
            ->notEmpty('roll_no');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('dob')
            ->maxLength('dob', 50)
            ->requirePresence('dob', 'create')
            ->notEmpty('dob');

        $validator
            ->scalar('father_name')
            ->maxLength('father_name', 100)
            ->requirePresence('father_name', 'create')
            ->notEmpty('father_name');

        $validator
            ->scalar('mother_name')
            ->maxLength('mother_name', 100)
            ->requirePresence('mother_name', 'create')
            ->notEmpty('mother_name');

        $validator
            ->scalar('father_mobile_no')
            ->maxLength('father_mobile_no', 15)
            ->requirePresence('father_mobile_no', 'create')
            ->notEmpty('father_mobile_no');

        $validator
            ->scalar('mother_mobile_no')
            ->maxLength('mother_mobile_no', 15)
            ->requirePresence('mother_mobile_no', 'create')
            ->notEmpty('mother_mobile_no');

        $validator
            ->scalar('student_mobile_no')
            ->maxLength('student_mobile_no', 15)
            ->requirePresence('student_mobile_no', 'create')
            ->notEmpty('student_mobile_no');

        $validator
            ->scalar('teacher_mobile_no')
            ->maxLength('teacher_mobile_no', 15)
            ->requirePresence('teacher_mobile_no', 'create')
            ->notEmpty('teacher_mobile_no');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

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
            ->scalar('profile_pic')
            ->maxLength('profile_pic', 500)
            ->requirePresence('profile_pic', 'create')
            ->notEmpty('profile_pic');*/

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
        $rules->add($rules->existsIn(['master_medium_id'], 'MasterMediums'));

        return $rules;
    }
}
