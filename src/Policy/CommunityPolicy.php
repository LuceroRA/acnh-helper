<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Community;
use Authorization\IdentityInterface;

/**
 * Community policy
 */
class CommunityPolicy
{
    /**
     * Check if $user can add Community
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Community $community
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Community $community)
    {
        //Any authenticated user can add new community
        return true;
    }

    /**
     * Check if $user can edit Community
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Community $community
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Community $community)
    {
        //Any authenticated user can edit a community 
        return true;
    }

    /**
     * Check if $user can delete Community
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Community $community
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Community $community)
    {
        //Users cannot delete communities
        return false;
    }

    /**
     * Check if $user can view Community
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Community $community
     * @return bool
     */
    public function canView(IdentityInterface $user, Community $community)
    {
        //Any user can view communities
        return true;
    }
}
