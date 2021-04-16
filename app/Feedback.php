<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $primaryKey = 'id';

    protected $name ='name';

    protected $mail ='mail';

    protected $message ='message';
}
