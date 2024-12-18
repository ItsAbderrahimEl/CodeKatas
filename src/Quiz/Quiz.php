<?php

namespace App\Quiz;

use Exception;

class Quiz
{
	private Questions $questions;


	public function __construct()
	{
		$this->questions = new Questions();
	}


	public function addQuestion(Question $question): void
	{
		$this->questions->add($question);
	}

	public function begin(): Question
	{
		return $this->questions->next();
	}

	public function nextQuestion(): Question
	{
		return $this->questions->next();
	}


	public function questions(): array
	{
		return $this->questions->all();
	}


	/** @throws Exception */
	public function grade(): int
	{
		if($this->questions->isEmpty())
			return 0;

		$this->questions->isFinished();

		return $this->questions->answeredPercentage();
	}
}