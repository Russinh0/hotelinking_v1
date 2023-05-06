docker compose up




User History
Una pequeña plataforma donde un usuario puede acceder, ve una lista de ofertas, y puede,
haciendo click sobre alguna de ellas, generar un código único que se guardará en la base
de datos y después puede revisar que códigos promocionales tiene en una página de
detalle. En la página de detalle, el usuario puede pulsar sobre un botón canjear código que
marcará como canjeado el código de la BBDD y confirmará al usuario que se ha canjeado.





● Un usuario se registra o hace login en la aplicación

● El usuario ve una lista de ofertas y un botón para generar un código promocional

● Un usuario puede hacer click en el botón para recibir un código promocional, éste
tiene que ser único.

● El usuario puede ver un listado de sus códigos promocionales, en otra página y,
haciendo click sobre cada uno de ellos, canjearlos. (No se necesita realizar un
sistema de canjeo complejo, simplemente marcarlo como canjeado)

● En todos los casos, aparecerá confirmación (Feedback) de las operaciones
realizadas.


backup

UserController.php
<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
class UserController extends Controller
{
    protected $users;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users =$users;
    }

    public function register($payload)
    {
        $users=$this->users->create($payload);
    }
    //
}


UserRepository.php

<?php

namespace App\Repositories;


interface UserRepository
{
    public function create($payload);
    public function getAll();
}

UserServices.php

<?php

namespace App\Repositories;

use App\Models\User;

use App\Repositories\UserRepository;

class UserServices implements UserRepository 
{
    public function create($payload){
        return User::create($payload);
    }

    public function getAll(){
        return User::all();
    }
};