<?php

use Phinx\Migration\AbstractMigration;

class InitTasks extends AbstractMigration
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

		// Example tasks and associated users
		$user = [
			[
				'name' 			=> 'Take out the trash.',
				'description'	=> 'Me mum needs me to take out the trash, not sure why she wont do it herself.',
				'start_date'	=> '2016-06-27 17:30:00',
				'due_date'		=> '2016-07-01 14:10:00',
				'importance'	=> 'Moderately',
				'user_id'		=> '1'
			],
			[
				'name' 			=> 'Wash Dishes.',
				'description'	=> 'Wife chased kids all day, I need to wash dishes. Her and my mum are gonna drive me to drinking.',
				'start_date'	=> '2016-06-27 17:30:00',
				'due_date'		=> '2016-07-02 15:00:00',
				'importance'	=> 'Highly',
				'user_id'		=> '1'
			],
			[
				'name' 			=> 'Take out the trash.',
				'description'	=> 'Go find Yoda and take R2 with me. Must remember R2.',
				'start_date'	=> '2016-06-28 12:25:00',
				'due_date'		=> '2016-07-02 18:50:00',
				'importance'	=> 'Moderately',
				'user_id'		=> '4'
			],
			[
				'name' 			=> 'Wash Dishes.',
				'description'	=> 'Build a working rocket ship with Legos. Should be asy.',
				'start_date'	=> '2016-06-27 17:30:00',
				'due_date'		=> '2016-07-02 15:00:00',
				'importance'	=> 'Low',
				'user_id'		=> '4'
			]
		];

		// this is a handy shortcut
		$this->insert('tasks', $user);
    }
}<?php

use Phinx\Migration\AbstractMigration;

class InitTasks extends AbstractMigration
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

		// Example tasks and associated users
		$user = [
			[
				'name' 			=> 'Take out the trash.',
				'description'	=> 'Me mum needs me to take out the trash, not sure why she wont do it herself.',
				'start_date'	=> '2016-06-27 17:30:00',
				'due_date'		=> '2016-07-01 14:10:00',
				'importance'	=> 'Moderately',
				'user_id'		=> '1'
			],
			[
				'name' 			=> 'Wash Dishes.',
				'description'	=> 'Wife chased kids all day, I need to wash dishes. Her and my mum are gonna drive me to drinking.',
				'start_date'	=> '2016-06-27 17:30:00',
				'due_date'		=> '2016-07-02 15:00:00',
				'importance'	=> 'Highly',
				'user_id'		=> '1'
			],
			[
				'name' 			=> 'Take out the trash.',
				'description'	=> 'Go find Yoda and take R2 with me. Must remember R2.',
				'start_date'	=> '2016-06-28 12:25:00',
				'due_date'		=> '2016-07-02 18:50:00',
				'importance'	=> 'Moderately',
				'user_id'		=> '4'
			],
			[
				'name' 			=> 'Wash Dishes.',
				'description'	=> 'Build a working rocket ship with Legos. Should be asy.',
				'start_date'	=> '2016-06-27 17:30:00',
				'due_date'		=> '2016-07-02 15:00:00',
				'importance'	=> 'Low',
				'user_id'		=> '4'
			]
		];

		// this is a handy shortcut
		$this->insert('tasks', $user);
    }
}
