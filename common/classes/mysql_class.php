<?php
Class MysqlDbQuery {
	var $connect_nums = 0;	//数据库当前页面连接次数
	var $IsConnet = 0;		//数据库是否已链接
	function connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect = '') {
		global $dbcharset;
		if($pconnect) {
			if(!@mysql_pconnect($dbhost, $dbuser, $dbpw)) {
				$this->Err('MYSQL 不能永久连接数据库,请确定数据库用户名,密码设置正确,并且服务器支持永久连接<br>');
				exit;
			}
		} else {
			if(!@mysql_connect($dbhost, $dbuser, $dbpw)) {
				$this->Err('MYSQL 连接数据库失败,请确定数据库用户名,密码设置正确<br>');
				exit;
			}
		}
		if(!@mysql_select_db($dbname)){
			$this->Err("MYSQL 连接成功,但当前使用的数据库 {$dbname} 不存在<br>");
			exit;
		}
		if( mysql_get_server_info() > '4.1' ){
			if($dbcharset){
				//mysql_query("SET NAMES '$dbcharset'");
				mysql_query("SET character_set_connection=$dbcharset,character_set_results=$dbcharset,character_set_client=binary");
			}else{
				mysql_query("SET character_set_client=binary");
			}
			if( mysql_get_server_info() > '5.0' ){
				mysql_query("SET sql_mode=''");
			}
		}
		$this->IsConnet=1;
	}

	function close() {
		$this->IsConnet=0;
		return mysql_close();
	}

	function query($SQL,$method='',$showerr='1') {
		if($this->IsConnet==0){
			global $dbhost, $dbuser, $dbpw, $dbname, $pconnect;
			$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
		}
		
		//分析统计查询时间
		$speed_headtime=explode(' ',microtime());
		$speed_headtime=$speed_headtime[0]+$speed_headtime[1];

		if($method=='U_B' && function_exists('mysql_unbuffered_query')){
			$query = mysql_unbuffered_query($SQL);
		}else{
			$query = mysql_query($SQL);
		}
		
		//分析统计查询时间
		$speed_endtime=explode(' ',microtime());
		$totaltime=number_format((($speed_endtime[0]+$speed_endtime[1]-$speed_headtime)/1),6);
		$speed_totaltime="TIME $totaltime second(s)\t$SQL\r\n";
	
		
		$this->connet_nums++;

		if (!$query&&$showerr=='1')  $this->Err("数据库连接出错:$SQL<br>");
		return $query;
	}

	function getOneRs($SQL){

		$query=$this->query($SQL,'U_B');
		
		$rs =& mysql_fetch_array($query, MYSQL_ASSOC);

		return $rs;
	}

	function update($SQL) {
		if($this->IsConnet==0){
			global $dbhost, $dbuser, $dbpw, $dbname, $pconnect;
			$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
		}

		if(function_exists('mysql_unbuffered_query')){
			$query = mysql_unbuffered_query($SQL);
		}else{
			$query = mysql_query($SQL);
		}
		$this->connect_nums++;

		if (!$query)  $this->Err("数据库连接出错:$SQL<br>");
		return $query;
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function num_rows($query) {
		$rows = mysql_num_rows($query);
		return $rows;
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		$id = mysql_insert_id();
		return $id;
	}

	function insert_file($file){
		$readfiles=read_file($file);
		$detail=explode("\n",$readfiles);
		$count=count($detail);
		for($j=0;$j<$count;$j++){
			$ck=substr($detail[$j],0,4);
			if( ereg("#",$ck)||ereg("--",$ck) ){
				continue;
			}
			$array[]=$detail[$j];
		}
		$read=implode("\n",$array); 
		$sql=str_replace("\r",'',$read);
		$detail=explode(";\n",$sql);
		$count=count($detail);
		for($i=0;$i<$count;$i++){
			$sql=str_replace("\r",'',$detail[$i]);
			$sql=str_replace("\n",'',$sql);
			$sql=trim($sql);
			if($sql){
				$this->query($sql);
				$check++;
			}
			
	
		}
		return $check;
	}

}

?>