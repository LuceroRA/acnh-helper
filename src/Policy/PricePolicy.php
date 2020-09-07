<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Price;
use Authorization\IdentityInterface;

/**
 * Price policy
 */
class PricePolicy
{
    /**
     * Check if $user can create Price
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Price $price
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Price $price)
    {
        // All logged in users can create new price entries
        return true;
    }

    /**
     * Check if $user can edit Price
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Price $price
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Price $price)
    {
        // Users can only edit their own price entry
        return $this->isOwner($user, $price);
    }

    /**
     * Check if $user can delete Price
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Price $price
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Price $price)
    {
        // Users can only delete their own price entries
        return $this->isOwner($user, $price);
    }

    /**
     * Check if $user can view Price
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Price $price
     * @return bool
     */
    public function canView(IdentityInterface $user, Price $price)
    {
        // All logged in users can view prices of any user
        return true;
    }

    /**
     * Check to see if user is attempting to access their own price entry
     * 
     * @param Authorization\IdentityInterface $user The user making a request
     * @param App\Model\Entity\Price $price The resource being accessed
     * @return bool
     */
    protected function isOwner(IdentityInterface $user, User $price) {
        return $user->getIdentifier() === $price->user_id;
    }
}
