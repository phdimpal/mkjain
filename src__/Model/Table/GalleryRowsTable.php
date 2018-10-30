<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GalleryRows Model
 *
 * @property \App\Model\Table\GalleriesTable|\Cake\ORM\Association\BelongsTo $Galleries
 *
 * @method \App\Model\Entity\GalleryRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\GalleryRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GalleryRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GalleryRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GalleryRow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GalleryRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GalleryRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GalleryRow findOrCreate($search, callable $callback = null, $options = [])
 */
class GalleryRowsTable extends Table
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

        $this->setTable('gallery_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Galleries', [
            'foreignKey' => 'gallery_id',
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
            ->integer('gallery_pic')
            ->requirePresence('gallery_pic', 'create')
            ->notEmpty('gallery_pic');

        $validator
            ->requirePresence('flag', 'create')
            ->notEmpty('flag');

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
        $rules->add($rules->existsIn(['gallery_id'], 'Galleries'));

        return $rules;
    }
}
