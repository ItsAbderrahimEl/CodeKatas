<?php

namespace App\Quiz;

use Exception;

class Questions
{
	protected array $questions = [];
	private int $nextQuestion = -1;


	public function add(Question $question): void
	{
		$this->questions[] = $question;
	}


	public function next(): Question

	{
		$this->nextQuestion++;

		if(!isset($this->questions[ $this->nextQuestion ]))
			return end($this->questions);

		return $this->questions[ $this->nextQuestion ];
	}


	public function all(): array
	{
		return $this->questions;
	}


	public function isCompleted(): bool
	{
		return !count(array_filter($this->questions, fn($q) => !$q->isAnswered()));
	}


	public function isEmpty(): bool
	{
		return empty($this->questions);
	}


	public function answeredPercentage(): int
	{
		return (int)(
			($this->correctlyAnswered() / count($this->questions)) * 100
		);
	}


	/** @throws Exception */
	public function isFinished(): void
	{
		if(!$this->isCompleted())
			throw new Exception('This quiz has not been isCompleted yet.');
	}


	private function correctlyAnswered(): bool
	{
		return count(
			array_filter($this->questions, fn($q) => $q->solved())
		);
	}
}