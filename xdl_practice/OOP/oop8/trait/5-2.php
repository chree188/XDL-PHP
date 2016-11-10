<?php	
header("content-type:text/html;charset=utf8");

trait A
{
	public function demo()
	{
		echo 'A中的demo<br>';
	}
}

class User
{
//	use A;
	public function demo()
	{
		echo 'User中的demo<br>';
	}
}

class VipUser extends User
{
	use A;
}

$u1 = new VipUser();
$u1->demo();
