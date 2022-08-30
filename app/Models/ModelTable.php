<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelTable extends Model
{
    use HasFactory;

    //table name
    protected $table = 'model_table';

    // set primary key to uid
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    //protected $dateFormat = 'Y-m-d H:i:s';

    //change default created_at and updated_at column names
    //const CREATED_AT = 'created';
    //const UPDATED_AT = 'updated';

    // if we need connect to another database
    //protected $connection = 'mysql_second_db'; // mysql_second_db - name of connection in config/database.php

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        //'created_at',
        //'updated_at',
    ];

    //constructor
    public function __construct()
    {
        //$this->uid = uniqid();
        $this->uid = Str::random(32);
    }




}
