<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assignment Entity
 *
 * @property int $id
 * @property int $master_role_id
 * @property string $assignment_type
 * @property int $student_id
 * @property int $master_class_id
 * @property int $master_section_id
 * @property int $master_subject_id
 * @property string $topic
 * @property \Cake\I18n\FrozenDate $assignment_date
 * @property string $assignment_file
 * @property string $description
 * @property int $created_by
 * @property int $edited_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 * @property int $registration_id
 *
 * @property \App\Model\Entity\MasterRole $master_role
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\MasterClass $master_class
 * @property \App\Model\Entity\MasterSection $master_section
 * @property \App\Model\Entity\MasterSubject $master_subject
 * @property \App\Model\Entity\Registration $registration
 */
class Assignment extends Entity
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
        'master_role_id' => true,
        'assignment_type' => true,
        'student_id' => true,
        'master_class_id' => true,
        'master_section_id' => true,
        'master_subject_id' => true,
        'topic' => true,
        'assignment_date' => true,
        'assignment_file' => true,
        'description' => true,
        'created_by' => true,
        'edited_by' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true,
        'registration_id' => true,
        'master_role' => true,
        'student' => true,
        'master_class' => true,
        'master_section' => true,
        'master_subject' => true,
        'registration' => true
    ];
}
