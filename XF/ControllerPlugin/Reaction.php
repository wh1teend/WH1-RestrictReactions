<?php

namespace WH1\RestrictReactions\XF\ControllerPlugin;

use XF\Entity\ReactionTrait;
use XF\Mvc\Entity\Entity;

class Reaction extends XFCP_Reaction
{
	protected function validateReactionAction(Entity $content, &$existingReaction = null)
	{
        $reaction = parent::validateReactionAction($content, $existingReaction);

        $user = $this->finder('XF:User')->where('user_id', $content->user_id)->fetchOne();
        if ($user->isMemberOf($reaction->restriction_group_ids))
        {
            throw $this->exception($this->noPermission());
        }

		return $reaction;
	}
}