<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrat
 * 
 * @property int $contrat_id
 * @property int $client_id
 * @property string $type
 * @property Carbon $date_souscription
 * @property int $montant_assure
 * @property int $duree
 * @property Carbon $date_fin
 * 
 * @property Client $client
 * @property Collection|Sinistre[] $sinistres
 *
 * @package App\Models
 */
class Contrat extends Model
{
	protected $table = 'contrats';
	protected $primaryKey = 'contrat_id';
	public $timestamps = true;

	protected $casts = [
		'client_id' => 'int',
		'date_souscription' => 'datetime',
		'montant_assure' => 'int',
		'duree' => 'int',
		'date_fin' => 'datetime'
	];

	protected $fillable = [
		'client_id',
		'type',
		'date_souscription',
		'montant_assure',
		'duree',
		'date_fin'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client_id');
	}

	public function sinistres()
	{
		return $this->hasMany(Sinistre::class);
	}
}
