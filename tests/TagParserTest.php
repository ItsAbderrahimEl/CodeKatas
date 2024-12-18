<?php


use App\TagParser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
	#[DataProvider('tagsProvider')] public function test_it_can_parse_a_list_of_tags($input, $expected)
	{
		//Arrange
		$parser = new TagParser();

		//Act
		$results = $parser->parse($input);

		//Assert
		$this->assertEquals($results, $expected);
	}


	public static function tagsProvider(): array
	{
		return [
			["pizza, hamburger, spaghetti" , ['pizza', 'hamburger', 'spaghetti']],
			["pizza|hamburger|spaghetti" , ['pizza','hamburger', 'spaghetti']],
			["pizza |hamburger |spaghetti" , ['pizza','hamburger', 'spaghetti']],
			["pizza | hamburger | spaghetti" , ['pizza','hamburger', 'spaghetti']],
			["pizza| hamburger| spaghetti" , ['pizza','hamburger', 'spaghetti']],
		];
	}
}
