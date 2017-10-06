<?php

namespace Entities;

/**
 * Class ABaseEntity
 * @package Entities
 */
abstract class ABaseEntity {

	/**
	 * @param array $data
	 * @return ABaseEntity
	 */
	public function setData( array $data = [] ): ABaseEntity {
		if (!empty($data)) {
			foreach ($data AS $key => $val) {
				$setterName = 'set' . ucfirst($key);
				if (method_exists($this, $setterName)) {
					$this->$setterName($val);
				}
			}
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function toArray(): array {
		return get_object_vars($this);
	}
}