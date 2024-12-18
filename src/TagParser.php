<?php

namespace App;

class TagParser
{
	public function parse(string $tag): array {
		return  preg_split("/ ?[,|] ?/", $tag);
	}
}