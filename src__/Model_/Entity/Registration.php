<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registration Entity
 *
 * @property int $id
 * @property int $master_role_id
 * @property string $roll_no
 * @property string $name
 * @property string $dob
 * @property string $father_name
 * @property string $mother_name
 * @property string $father_mobile_no
 * @property string $mother_mobile_no
 * @property string $student_mobile_no
 * @property string $teacher_mobile_no
 * @property string $address
 * @property int $master_class_id
 * @property int $master_section_id
 * @property int $master_medium_id
 * @property int $is_deleted
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $created_by
 * @property int $edited_by
 * @property string $profile_pic
 *
 * @property \App\Model\Entity\MasterRole $master_role
 * @property \App\Model\Entity\MasterClass $master_class
 * @property \App\Model\Entity\MasterSection $master_section
 * @property \App\Model\Entity\MasterMedia $master_media
 */
class Registration extends Entity
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
        'roll_no' => true,
        'name' => true,
        'dob' => true,
        'father_name' => true,
        'mother_name' => true,
        'father_mobile_no' => true,
        'mother_mobile_no' => true,
        'student_mobile_no' => true,
        'teacher_mobile_no' => true,
        'address' => true,
        'master_class_id' => true,
        'master_section_id' => true,
        'master_medium_id' => true,
        'is_deleted' => true,
        'created_on' => true,
        'updated_on' => true,
        'created_by' => true,
        'edited_by' => true,
        'profile_pic' => true,
        'master_role' => true,
        'master_class' => true,
        'master_section' => true,
        'master_media' => true
    ];
}
