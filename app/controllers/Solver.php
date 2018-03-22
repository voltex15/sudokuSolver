<?php

class Solver extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SolverModel');
	}
	
	public function solve()
	{
		$dane = $this->input->post();
		
		if ($this->SolverModel->validateEntryData($dane) == false)
		{
			echo "Popraw dane wejściowe!";
		}
		
		$tableAllCells = $this->SolverModel->checkOneCell($dane);
		
		while ($this->SolverModel->countPossibleNumbers($tableAllCells) == 1)
		{
			$this->SolverModel->checkOneCell($tableAllCells);
		}
		
		var_dump($tableAllCells);
		die();

	}
	
}
