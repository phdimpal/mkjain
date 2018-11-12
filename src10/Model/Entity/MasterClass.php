<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterClass Entity
 *
 * @property int $id
 * @property string $class_name
 * @property string $roman
 * @property int $flag
 *
 * @property \App\Model\Entity\Registration[] $registrations
 * @property \App\Model\Entity\Syllabus[] $syllabuses
 */
class MasterClass extends Entity
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
        'class_name' => true,
        'roman' => true,
        'flag' => true,
        'registrations' => true,
        'syllabuses' => true
    ];
}
