<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Price Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $monday_price
 * @property int|null $tuesday_price
 * @property int|null $wednesday_price
 * @property int|null $thursday_price
 * @property int|null $friday_price
 * @property int|null $saturday_price
 * @property int|null $sunday_price
 *
 */
class Price extends Entity
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
        'user_id' => true,
        'monday_price' => true,
        'tuesday_price' => true,
        'wednesday_price' => true,
        'thursday_price' => true,
        'friday_price' => true,
        'saturday_price' => true,
        'sunday_price' => true,
    ];
}
