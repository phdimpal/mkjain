<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AssignmentRow Entity
 *
 * @property int $id
 * @property int $registration_id
 * @property int $assignment_id
 *
 * @property \App\Model\Entity\Registration $registration
 * @property \App\Model\Entity\Assignment $assignment
 */
class AssignmentRow extends Entity
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
        'registration_id' => true,
        'assignment_id' => true,
        'registration' => true,
        'assignment' => true
    ];
}
