<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @see http://www.codeigniter.com/userguide2/libraries/migration.html
 */
class Migration_Add_urls extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'url_id' => array(
				'type' => 'int',
				'constraint' => '11',
				'unsigned' => true,
				'auto_increment' => true,
				'null' => false
			),
			'url_code' => array(
				'type' => 'varchar',
				'constraint' => '10',
				'null' => false
			),
			'url_address' => array(
				'type' => 'text',
				'null' => false
			)
		));
		$this->dbforge->add_field('url_created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
		$this->dbforge->add_key('url_id', TRUE);

		$this->dbforge->create_table('urls');
	}

	public function down()
	{
		$this->dbforge->drop_table('urls');
	}

}
