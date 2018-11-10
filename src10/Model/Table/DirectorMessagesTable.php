<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DirectorMessages Model
 *
 * @method \App\Model\Entity\DirectorMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\DirectorMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DirectorMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DirectorMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DirectorMessage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DirectorMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DirectorMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DirectorMessage findOrCreate($search, callable $callback = null, $options = [])
 */
class DirectorMessagesTable extends Table
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

        $this->setTable('director_messages');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->scalar('title')
            ->maxLength('title', 250)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('discription')
            ->requirePresence('discription', 'create')
            ->notEmpty('discription');

        $validator
            ->scalar('image')
            ->maxLength('image', 500)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

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
            ->notEmpty('is_deleted');

        $validator
            ->requirePresence('is_status', 'create')
            ->notEmpty('is_status');

        return $validator;
    }
}
