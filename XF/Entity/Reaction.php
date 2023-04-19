<?php
namespace WH1\RestrictReactions\XF\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class Reaction extends XFCP_Reaction
{
	public static function getStructure(Structure $structure)
	{
		$structure = parent::getStructure($structure);

		$structure->columns['restriction_group_ids'] = ['type' => self::LIST_COMMA, 'default' => 0];

		return $structure;
	}
}