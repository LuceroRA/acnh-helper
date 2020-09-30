<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Chronos\Chronos;

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
        'today_price' => true,
    ];

    protected function _getTodayPrice()
    {
        // Retrieve the current day of the week
        // This is formatted as an integer from 1 to 7
        $today = Chronos::today()->dayOfWeek;

        switch($today)
        {
            case 1:
                return $this->_fields['monday_price'];
            break;
            case 2:
                return $this->_fields['tuesday_price'];
            break;
            case 3:
                return $this->_fields['wednesday_price'];
            break;
            case 4:
                return $this->_fields['thursday_price'];
            break;
            case 5:
                return $this->_fields['friday_price'];
            break;
            case 6:
                return $this->_fields['saturday_price'];
            break;
            case 7:
                return $this->_fields['sunday_price'];
            break;

        }
    }
}
