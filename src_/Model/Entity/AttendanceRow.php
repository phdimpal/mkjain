<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttendanceRow Entity
 *
 * @property int $id
 * @property int $attendance_id
 * @property int $student_id
 * @property string $attendance_mark
 *
 * @property \App\Model\Entity\Attendance $attendance
 * @property \App\Model\Entity\Student $student
 */
class AttendanceRow extends Entity
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
        'attendance_id' => true,
        'student_id' => true,
        'attendance_mark' => true,
        'attendance' => true,
        'student' => true
    ];
}
