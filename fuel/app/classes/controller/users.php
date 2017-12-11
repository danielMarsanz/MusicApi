<?php 
class Controller_Users extends Controller_Rest
{

    public function post_create()
    {
        try {
            if ( ! isset($_POST['name']) || $_POST['name'] == "" || ! isset($_POST['pass']) || $_POST['pass'] == "") 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'parametro incorrecto, se necesita el nombre y la contraseña'
                ));

                return $json;
            }

            $input = $_POST;
            $user = new Model_Users();
            $user->nombre = $input['name'];
            $user->contrasenia = $input['pass'];
            $user->save();

            $json = $this->response(array(
                'code' => 200,
                'message' => 'usuario creado',
                'name' => $input['name']
            ));

            return $json;

        } 
        catch (Exception $e) 
        {
            $json = $this->response(array(
                'code' => 500,
                'message' => 'error interno del servidor',
            ));

            return $json;
        } 
    }

    public function get_users()
    {
    	$users = Model_Users::find('all');

    	return $this->response(Arr::reindex($users));
    }

    public function post_delete()
    {
        $user = Model_Users::find($_POST['id']);
        $userName = $user->nombre;
        $user->delete();

        $json = $this->response(array(
            'code' => 200,
            'message' => 'usuario borrado',
            'name' => $userName
        ));

        return $json;
    }
}