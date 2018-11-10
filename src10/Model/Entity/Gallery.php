<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gallery Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image_url
 * @property \Cake\I18n\FrozenDate $media_date
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 * @property int $created_by
 * @property int $edited_by
 *
 * @property \App\Model\Entity\GalleryRow[] $gallery_rows
 */
class Gallery extends Entity
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
        'title' => true,
        'description' => true,
        'image_url' => true,
        'media_date' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true,
        'created_by' => true,
        'edited_by' => true,
        'gallery_rows' => true
    ];
}
