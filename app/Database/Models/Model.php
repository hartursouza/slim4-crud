<?php

namespace App\Database\Models;

use App\Traits\{Create, Read, Update, Delete, Connection};

abstract class Model
{
    use Create, Read, Update, Delete, Connection;

}