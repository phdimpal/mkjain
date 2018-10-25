<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterMedium Entity
 *
 * @property int $id
 * @property string $medium_name
 * @property int $flag
 *
 * @property \App\Model\Entity\Registration[] $registrations
 */
class MasterMedium extends Entity
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
        'medium_name' => true,
        'flag' => true,
        'registrations' => true
    ];
}
