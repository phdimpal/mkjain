<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterRoles Model
 *
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\HasMany $Registrations
 *
 * @method \App\Model\Entity\MasterRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterRole|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterRole findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterRolesTable extends Table
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

        $this->setTable('master_roles');
        $this->setDisplayField('role_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Registrations', [
            'foreignKey' => 'master_role_id'
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
            ->scalar('role_name')
            ->maxLength('role_name', 100)
            ->requirePresence('role_name', 'create')
            ->notEmpty('role_name');

        return $validator;
    }
}
