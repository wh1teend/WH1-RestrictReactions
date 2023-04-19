<?php

namespace WH1\RestrictReactions\XF\Admin\Controller;

use XF\Mvc\Entity\AbstractCollection;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\AbstractReply;

class Reaction extends XFCP_Reaction
{
    public function reactionAddEdit(\XF\Entity\Reaction $reaction)
    {
        $reaction = parent::reactionAddEdit($reaction);

        $reaction->setParams([
            'userGroups' => $this->repository('XF:UserGroup')->getUserGroupTitlePairs(),
        ]);

        return $reaction;
    }

    protected function reactionSaveProcess(\XF\Entity\Reaction $reaction)
    {
        $form = parent::reactionSaveProcess($reaction);

        $restriction_group_ids = $this->filter('restriction_group_ids', 'array-uint');

        $form->setupEntityInput($reaction, [
            'restriction_group_ids' => $restriction_group_ids
        ]);

        return $form;
    }
}