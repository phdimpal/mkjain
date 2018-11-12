<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentFee Entity
 *
 * @property int $id
 * @property int $student_id
 * @property float $total_fee
 * @property float $due_fee
 *
 * @property \App\Model\Entity\Student $student
 */
class StudentFee extends Entity
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
        'student_id' => true,
        'total_fee' => true,
        'due_fee' => true,
        'student' => true
    ];
}
