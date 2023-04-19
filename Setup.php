<?php

namespace WH1\RestrictReactions;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;
use XF\Db\SchemaManager;
use XR\PM\Install\Data\MySql;


class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

    public function installStep1()
    {
        $sm = $this->schemaManager();

        $this->schemaManager()->alterTable('xf_reaction', function (Alter $table)
        {
            $table->addColumn('restriction_group_ids', 'varbinary', 255)->setDefault('');
        });
    }

    public function uninstallStep1()
    {
        $sm = $this->schemaManager();

        $this->schemaManager()->alterTable('xf_reaction', function (Alter $table)
        {
            $table->dropColumns('restriction_group_ids');
        });
    }
}