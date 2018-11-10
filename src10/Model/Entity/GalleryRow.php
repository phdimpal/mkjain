<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GalleryRow Entity
 *
 * @property int $id
 * @property int $gallery_id
 * @property int $gallery_pic
 * @property int $flag
 *
 * @property \App\Model\Entity\Gallery $gallery
 */
class GalleryRow extends Entity
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
        'gallery_id' => true,
        'gallery_pic' => true,
        'flag' => true,
        'gallery' => true
    ];
}
