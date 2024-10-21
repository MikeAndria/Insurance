<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sinistre
 * 
 * @property int $sinistre_id
 * @property Carbon $date_declaration
 * @property int $montant_indemnise
 * @property int $contrat_id
 * 
 * @property Contrat $contrat
 *
 * @package App\Models
 */
class Sinistre extends Model
{
	protected $table = 'sinistres';
	protected $primaryKey = 'sinistre_id';
	public $timestamps = true;

	protected $casts = [
		'date_declaration' => 'datetime',
		'montant_indemnise' => 'int',
		'contrat_id' => 'int'
	];

	protected $fillable = [
		'date_declaration',
		'montant_indemnise',
		'contrat_id'
	];

	public function contrat()
	{
		return $this->belongsTo(Contrat::class, 'contrat_id');
	}
}
