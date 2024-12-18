<?php

namespace App\Quiz;

class Question
{
	protected string $question;
	protected mixed $solution;
	protected bool $correct;
	protected mixed $answer = NULL;


	public function __construct($question, $solution)
	{
		$this->question = $question;
		$this->solution = $solution;
	}


	public function answer($answer): Question
	{
		$this->answer = $answer;
		$this->solved();
		return $this;
	}


	public function solved(): bool
	{
		return $this->correct = ($this->answer === $this->solution);
	}


	public function isAnswered(): bool
	{
		return (bool)$this->answer;
	}

}