<?php

class Sudoku extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('sudoku');
	}
}
