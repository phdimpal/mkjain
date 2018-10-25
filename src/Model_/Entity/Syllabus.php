<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Syllabus Entity
 *
 * @property int $id
 * @property int $master_class_id
 * @property int $master_section_id
 * @property int $master_subject_id
 * @property string $syllabus_file
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterClass $master_class
 * @property \App\Model\Entity\MasterSection $master_section
 * @property \App\Model\Entity\MasterSubject $master_subject
 */
class Syllabus extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'master_class_id' => true,
        'master_section_id' => true,
        'master_subject_id' => true,
        'syllabus_file' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true,
        'master_class' => true,
        'master_section' => true,
        'master_subject' => true
    ];
}
