<?php
namespace Fuel\Migrations;

class Usuarios
{

    function up()
    {
        \DBUtil::create_table('usuarios', array(
            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'nombre' => array('type' => 'varchar', 'constraint' => 100),
            'contrasenia' => array('type' => 'varchar', 'constraint' => 100),
        ), array('id'));
    }

    function down()
    {
       \DBUtil::drop_table('usuarios');
    }
}
