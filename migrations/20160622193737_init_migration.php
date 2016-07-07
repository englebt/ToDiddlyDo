<?php

use Phinx\Migration\AbstractMigration;

class InitMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
	public function up() {

		//Create the tasks table
		$tasks = $this->table('tasks');
		$tasks->addColumn('name', 		'string')
			->addColumn('description', 	'string')
			->addColumn('start_date', 	'datetime')
			->addColumn('due_date', 	'datetime')
			->addColumn('is_complete',	'string', array('default' => 'No'))
			->addColumn('importance',	'string', array('default' => 'Low')) //Highly, Moderately, Low
			->addColumn('user_id',		'integer')
			->create();

		//Create the users table
		$users = $this->table('users');
		$users->addColumn('username', 	'string')
			->addColumn('display_name', 'string')
			->addColumn('email',		'string')
			->addColumn('password', 	'string')
			->addColumn('user_role',	'integer', array('default' => '1')) //1 = member, 1 = admin
			->addColumn('registered', 	'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
			->create();

		//Create the user roles tables
		$users = $this->table('user_roles');
		$users->addColumn('name', 'string', array('default' => 'members')) //Admin, Member
			->create();
    }
}
