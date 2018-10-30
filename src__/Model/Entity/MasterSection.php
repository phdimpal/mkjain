<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterSection Entity
 *
 * @property int $id
 * @property string $section_name
 * @property int $flag
 *
 * @property \App\Model\Entity\Registration[] $registrations
 * @property \App\Model\Entity\Syllabus[] $syllabuses
 */
class MasterSection extends Entity
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
        'section_name' => true,
        'flag' => true,
        'registrations' => true,
        'syllabuses' => true
    ];
}
