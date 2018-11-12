<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RegSm Entity
 *
 * @property int $id
 * @property int $roll_no
 * @property string $name
 * @property string $father_mobile_no
 * @property string $student_mobile_no
 */
class RegSm extends Entity
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
        'roll_no' => true,
        'name' => true,
        'father_mobile_no' => true,
        'student_mobile_no' => true
    ];
}
