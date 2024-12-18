<?php

use App\Quiz\Question;
use App\Quiz\Quiz;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
	public function setUp(): void
	{
		$this->quiz = new Quiz();
	}


	#[Test] public function it_consists_of_questions()
	{
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));
		$this->quiz->addQuestion(new Question('What is 2 + 6 ?', 8));

		$this->assertCount(2, $this->quiz->questions());
	}


	/** @throws Exception */
	#[Test] public function it_cannot_grade_a_quiz_with_unanswered_questions()
	{
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));

		$this->expectException(Exception::class);
		$this->quiz->grade();
	}


	#[Test] public function it_returns_the_end_question_if_there_is_not_a_next_question()
	{
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));
		$question1 = $this->quiz->begin();
		$question2 = $this->quiz->nextQuestion();

		$this->assertEquals($question1, $question2);
	}


	#[Test] public function it_can_answer_questions()
	{
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));
		$question = $this->quiz->begin()->answer(4);
		$this->assertTrue($question->solved());
	}


	/** @throws Exception */
	#[Test] public function it_can_grade_a_quiz_with_failed_and_correct_questions()
	{
		$this->quiz->addQuestion(new Question('What is 2 + 2 ?', 4));
		$this->quiz->begin()->answer('incorrect answer');

		$this->quiz->addQuestion(new Question('What is 5 + 5 ?', 10));
		$this->quiz->nextQuestion()->answer(10);

		$this->assertEquals(50, $this->quiz->grade());
	}
}
