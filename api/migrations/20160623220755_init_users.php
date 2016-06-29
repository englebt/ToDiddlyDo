<?php

use Phinx\Migration\AbstractMigration;

class InitUsers extends AbstractMigration
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
    public function change()
    {

		// Default users for the project doers.
		$user = [
			[
				'username' 		=> 'aalicki',
				'display_name'	=> 'aalicki',
				'email'			=> 'aalicki@gmail.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '2'
			],
			[
				'username' 		=> '13lank null',
				'display_name'	=> '13lank_null',
				'email'			=> '13lank@gmail.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '2'
			],
			[
				'username' 		=> 'captain vee',
				'display_name'	=> 'captain_vee',
				'email'			=> 'vee@gmail.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '2'
			],
			[
				'username' 		=> 'jwalk1',
				'display_name'	=> 'jwalk1',
				'email'			=> 'jwalk1@gmail.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '2'
			],
			[
				'username' 		=> 'mith',
				'display_name'	=> 'mith',
				'email'			=> 'mith@gmail.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '2'
			],
			[
				'username' 		=> 'RegMember',
				'display_name'	=> 'Regular Member',
				'email'			=> 'regmem@todolist.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '1'
			],
			[
				'username' 		=> 'SuperUser',
				'display_name'	=> 'Super Member',
				'email'			=> 'supmem@todolist.com',
				'password'		=> 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', //123
				'user_role'		=> '2'
			]
		];

		// this is a handy shortcut
		$this->insert('users', $user);
    }
}
