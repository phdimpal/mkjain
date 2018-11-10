<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterYear Entity
 *
 * @property int $id
 * @property string $year_name
 * @property int $status
 */
class MasterYear extends Entity
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
        'year_name' => true,
        'status' => true
    ];
}
