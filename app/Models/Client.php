<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $client_id
 * @property string $nom
 * @property string $prenom
 * @property string $adresse
 * @property Carbon $date_de_naissance
 * @property string $type_contrat_souscrit
 * 
 * @property Collection|Contrat[] $contrats
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';
	protected $primaryKey = 'client_id';
	public $timestamps = true;

	protected $casts = [
		'date_de_naissance' => 'datetime'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'adresse',
		'date_de_naissance',
		'type_contrat_souscrit'
	];

	public function contrats()
	{
		return $this->hasMany(Contrat::class, 'client_id');
	}
}
