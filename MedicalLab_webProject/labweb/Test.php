<?php

class Test
{
	static function getAllTests($id)
	{
		$pdo=Database::connect();
        $query=$pdo->prepare("select * from tests where id=?");
		$query->execute(array($id));
		return $query;
	}
	
	static function insertTest($id,$file)
	{
		$fileName=$id.".pdf";
		
		$pdo=Database::connect();
		$query=$pdo->prepare("insert into tests(id,test) values (?,?)");
		if($query->execute(array($id,$fileName)))
		move_uploaded_file($file['tmp_name'],'C:\xampp\htdocs\basic\labweb\tests\\'.$fileName);//tests/555.pdf
    }

}

?>