<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterClasses Model
 *
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\HasMany $Registrations
 * @property \App\Model\Table\SyllabusesTable|\Cake\ORM\Association\HasMany $Syllabuses
 *
 * @method \App\Model\Entity\MasterClass get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterClass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterClass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterClass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterClass|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterClass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterClass findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterClassesTable extends Table
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

        $this->setTable('master_classes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Registrations', [
            'foreignKey' => 'master_class_id'
        ]);
        $this->hasMany('Syllabuses', [
            'foreignKey' => 'master_class_id'
        ]); 
		$this->hasMany('ClassSectionMappings', [
            'foreignKey' => 'master_class_id'
        ]);
        
        $this->hasMany('ClassSectionMappings', [
            'foreignKey' => 'master_class_id'
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
            ->scalar('class_name')
            ->maxLength('class_name', 50)
            ->requirePresence('class_name', 'create')
            ->notEmpty('class_name');

        $validator
            ->scalar('roman')
            ->maxLength('roman', 50)
            ->requirePresence('roman', 'create')
            ->notEmpty('roman');

        $validator
            ->integer('flag')
            ->requirePresence('flag', 'create')
            ->notEmpty('flag');

        return $validator;
    }
}
