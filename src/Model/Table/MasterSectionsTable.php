<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterSections Model
 *
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\HasMany $Registrations
 * @property \App\Model\Table\SyllabusesTable|\Cake\ORM\Association\HasMany $Syllabuses
 *
 * @method \App\Model\Entity\MasterSection get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterSection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterSection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterSection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterSection|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterSection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterSection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterSection findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterSectionsTable extends Table
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

        $this->setTable('master_sections');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Registrations', [
            'foreignKey' => 'master_section_id'
        ]);
         $this->hasMany('MasterSubjects', [
            'foreignKey' => 'master_subject_id'
        ]);
        $this->hasMany('Syllabuses', [
            'foreignKey' => 'master_section_id'
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
            ->scalar('section_name')
            ->maxLength('section_name', 50)
            ->requirePresence('section_name', 'create')
            ->notEmpty('section_name');

        $validator
            ->integer('flag')
            ->requirePresence('flag', 'create')
            ->notEmpty('flag'); */

        return $validator;
    }
}
