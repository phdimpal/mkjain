<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendance Entity
 *
 * @property int $id
 * @property int $master_role_id
 * @property int $registration_id
 * @property int $master_class_id
 * @property int $master_section_id
 * @property \Cake\I18n\FrozenDate $attendance_date
 * @property int $created_by
 * @property int $edited_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterRole $master_role
 * @property \App\Model\Entity\Registration $registration
 * @property \App\Model\Entity\MasterClass $master_class
 * @property \App\Model\Entity\MasterSection $master_section
 * @property \App\Model\Entity\AttendanceRow[] $attendance_rows
 */
class Attendance extends Entity
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
        'registration_id' => true,
        'master_class_id' => true,
        'master_section_id' => true,
        'attendance_date' => true,
        'created_by' => true,
        'edited_by' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true,
        'master_role' => true,
        'registration' => true,
        'master_class' => true,
        'master_section' => true,
        'attendance_rows' => true
    ];
}
