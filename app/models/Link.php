<?php


namespace Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $table = "links";

	protected $fillable = ['short_url', 'long_url', 'counter', 'active', 'exp_at'];

	protected $attributes = [
		'active' => true,
	];

	protected $primaryKey = 'short_url';

	public $incrementing = false;

	public $timestamps = false;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);

		$this->attributes['created_at'] = $this->freshTimestamp();
	}
}