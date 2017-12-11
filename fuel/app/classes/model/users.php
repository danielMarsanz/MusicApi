<?php
class Model_Users extends Orm\Model {
	protected static $_table_name = 'usuarios';
	protected static $_primary_key = array('id');
	protected static $_properties = array(
        'id',
        'nombre' => array(
            'data_type' => 'varchar'),

        'contrasenia' => array(
            'data_type' => 'varchar',
            
        )
    );
}
