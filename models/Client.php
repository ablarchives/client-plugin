<?php namespace AlbrightLabs\Client\Models;

use Model;
use BackendAuth;

/**
 * Client Model
 */
class Client extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'albrightlabs_client_clients';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name','surname','company','email','phone','street','city','state','zip',];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Jsonable fields
     */
    protected $jsonable = ['customFields',];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
      'admin' => 'Backend\Models\User',
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
      'image' => 'System\Models\File',
    ];
    public $attachMany = [];

    /**
     * Dynamic validation rules
     */
    public function beforeValidate()
    {
      $this->rules['email'] = 'required|unique:albrightlabs_client_clients,email,'.$this->id;
    }

    /**
     * Create admin owner
     */
    public function beforeCreate()
    {
      $this->admin_id = BackendAuth::getUser()->id;
    }
}
