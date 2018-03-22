<?php

class SolverModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	private function createRows(array $dane) : array
	{
		$rows = [];

		for ($i = 1; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 9; $j++)
			{
				$rows[$i][$j] = $dane[$i.'_'.$j];
			}
		}
		
		return $rows;
	}
	
	private function createColumns(array $dane) : array
	{
		$columns = [];
		
		for ($i = 1; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 9; $j++)
			{
				$columns[$j][$i] = $dane[$i.'_'.$j];
			}
		}
		
		return $columns;
	}
	
	private function createSquares(array $dane) : array
	{
		$squares = [];
		$k = 1;
		$num = 1;
		
		for ($i = 1; $i <= 3; $i++)
		{
			for ($j = 1; $j <= 3; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 1; $i <= 3; $i++)
		{
			for ($j = 4; $j <= 6; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 1; $i <= 3; $i++)
		{
			for ($j = 7; $j <= 9; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 4; $i <= 6; $i++)
		{
			for ($j = 1; $j <= 3; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 4; $i <= 6; $i++)
		{
			for ($j = 4; $j <= 6; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 4; $i <= 6; $i++)
		{
			for ($j = 7; $j <= 9; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 7; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 3; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		$k = 1;
		$num++;
		
		for ($i = 7; $i <= 9; $i++)
		{
			for ($j = 4; $j <= 6; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
	
		$k = 1;
		$num++;
		
		for ($i = 7; $i <= 9; $i++)
		{
			for ($j = 7; $j <= 9; $j++)
			{
				$squares[$num][$k] = $dane[$i.'_'.$j];
				$k++;
			}
		}
		
		return $squares;
	}
	
	private function createDiagonals(array $dane) : array
	{
		$diagonals = [];
		
		for ($i = 1; $i <= 9; $i++)
		{
			$diagonals[1][$i] = $dane[$i.'_'.$i];
		}
		
		for ($i = 1; $i <= 9; $i++)
		{
			$j = 10 - $i;
			$diagonals[2][$i] = $dane[$i.'_'.$j];
		}
		
		return $diagonals;
	}
	
	//Sprawdzenie czy w podanej tablicy juz wystepuje dana liczba
	public function isInArray(array $arrays, int $number) : bool
	{
		if (in_array($number, $arrays))
		{
			return true;
		}
	
		return false;
	}
	
	//Wypisanie wszystkich możliwych do wpisania liczb w kazdej komorce
	public function checkOneCell(array $dane) : array
	{
		$rows = $this->createRows($dane);
		$columns = $this->createColumns($dane);
		$squares = $this->createSquares($dane);
		
		$allCells = [];

		//Stworzenie tablicy zawierającej dostępne liczby dla każdej komórki
		//Poczatkowo wypelniona liczbami od 1 do 9
		for ($i = 1; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 9; $j++)
			{
				$allCells[$i][$j] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
			}
		}
		
		//Sprawdzenie wierszy i kolumn czy występuje dana liczba. Jak tak to zastępuje liczbę pusteym polem
		for ($i = 1; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 9; $j++)
			{
				for ($k = 1; $k <= 9; $k++)
				{
					if ($this->isInArray($rows[$i], $k) == true)
					{
						$allCells[$i][$j][$k-1] = '';
					}
					
					if ($this->isInArray($columns[$j], $k) == true)
					{
						$allCells[$i][$j][$k-1] = '';
					}
				}
			}
		}
		
		//Sprawdzenie czy w boxie jest liczba, jesli tak to zastapic liczbe pustym wierszem
		//Poprawic jeszcze to
		for ($i = 1; $i <= 9; $i++)
		{
			for ($j = 1; $j <= 9; $j++)
			{
				if ($this->isInArray($squares[$j], $j) == true)
				{
					if ($j == 1)
					{
						for ($ii = 1; $ii <= 3; $ii++)
						{
							for ($jj = 1; $jj <= 3; $jj++)
							{
								$allCells[$ii][$jj][0] = '';
							}
						}
					}
					if ($j == 2)
					{
						for ($ii = 1; $ii <= 3; $ii++)
						{
							for ($jj = 4; $jj <= 6; $jj++)
							{
								$allCells[$ii][$jj][1] = '';
							}
						}
					}
					if ($j == 3)
					{
						for ($ii = 1; $ii <= 3; $ii++)
						{
							for ($jj = 7; $jj <= 9; $jj++)
							{
								$allCells[$ii][$jj][2] = '';
							}
						}
					}
					if ($j == 4)
					{
						for ($ii = 4; $ii <= 6; $ii++)
						{
							for ($jj = 1; $jj <= 3; $jj++)
							{
								$allCells[$ii][$jj][3] = '';
							}
						}
					}
					if ($j == 5)
					{
						for ($ii = 4; $ii <= 6; $ii++)
						{
							for ($jj = 4; $jj <= 6; $jj++)
							{
								$allCells[$ii][$jj][4] = '';
							}
						}
					}
					if ($j == 6)
					{
						for ($ii = 4; $ii <= 6; $ii++)
						{
							for ($jj = 7; $jj <= 9; $jj++)
							{
								$allCells[$ii][$jj][5] = '';
							}
						}
					}
					if ($j == 7)
					{
						for ($ii = 7; $ii <= 9; $ii++)
						{
							for ($jj = 1; $jj <= 3; $jj++)
							{
								$allCells[$ii][$jj][6] = '';
							}
						}
					}
					if ($j == 8)
					{
						for ($ii = 7; $ii <= 9; $ii++)
						{
							for ($jj = 4; $jj <= 6; $jj++)
							{
								$allCells[$ii][$jj][7] = '';
							}
						}
					}
					if ($j == 9)
					{
						for ($ii = 7; $ii <= 9; $ii++)
						{
							for ($jj = 7; $jj <= 9; $jj++)
							{
								$allCells[$ii][$jj][8] = '';
							}
						}
					}
				}
			}
		}
		
		//Usuwanie niepotrzebnych tabel
		unset($rows);
		unset($columns);
		unset($squares);
		
		return $allCells;
	}
	
	//Obliczenie ile numerow jest dostepnych
	public function countPossibleNumbers(array $array) : int
	{
		$countNumber = count($array);
		
		foreach ($array as $item)
		{
			if ($item == '')
			{
				$countNumber--;
			}
		}
		return $countNumber;
	}
	
	//Sprawdzanie czy w podanej tablicy wystepuje wiecej niz 1 taka sama liczba
	private function doubleNumbersInEntryArray(array $array) : bool
	{
		$doubleArray = array_count_values($array);

		foreach ($doubleArray as $key => $value)
		{
			if ($key == '' || $value == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	//Sprawdzenie poczatkowych danych, czy wystepuja konflikty 
	public function validateEntryData(array $dane) : bool
	{
		$rows = $this->createRows($dane);
		$columns = $this->createColumns($dane);
		$squares = $this->createSquares($dane);
		
		for ($i = 1; $i <= 9; $i++)
		{
			if (($this->doubleNumbersInEntryArray($rows[$i]) == false) || 
				($this->doubleNumbersInEntryArray($columns[$i]) == false) ||
				($this->doubleNumbersInEntryArray($squares[$i]) == false))
			{
				unset($rows);
				unset($columns);
				unset($squares);
				
				return false;
			}
		}
		
		unset($rows);
		unset($columns);
		unset($squares);
		
		return true;
	}
	
	
	
}
