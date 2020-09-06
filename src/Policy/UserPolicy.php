<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class UserPolicy
{
    /**
     * Check if $user can create User
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\User $resource
     * @return bool
     */
    public function canCreate(IdentityInterface $user, User $resource)
    {
        // Cannot create new user if already logged in
        return false;
    }

    /**
     * Check if $user can edit User
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\User $resource
     * @return bool
     */
    public function canEdit(IdentityInterface $user, User $resource)
    {
        // Users can only edit their own user data
        return $this->isOwner($user, $resource);
    }

    /**
     * Check if $user can delete User
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\User $resource
     * @return bool
     */
    public function canDelete(IdentityInterface $user, User $resource)
    {
        // Users can only delete their own user data
        return $this->isOwner($user, $resource);
    }

    /**
     * Check if $user can view User
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\User $resource
     * @return bool
     */
    public function canView(IdentityInterface $user, User $resource)
    {
        // Users can only view their own user data
        return $this->isOwner($user, $resource);
    }

    /**
     * Check to see if user is attempting to access their own user data
     * 
     * @param Authorization\IdentityInterface $user The user making a request
     * @param App\Model\Entity\User $resource The resource being accessed
     * @return bool
     */
    protected function isOwner(IdentityInterface $user, User $resource) {
        return $user->getIdentifier() === $resource->id;
    }
}
