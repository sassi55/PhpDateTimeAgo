<?php
/**
	 * PHP-date-ago-class
	 *
	 * @author   Sassi Souid <sassisouid2010@gmail.com>
	 * @author-profile https://www.facebook.com/sassisouid/
	 * @license MIT 
	 * @link  https://github.com/sassi55/PhpDateTimeAgo
	 * @version 1.0.0
	 * Convert timespam to human readable form for some language
	*/	
class DateTimeAgo{
	//you can add multiple languages here
	private $language;
	 function __Lang($lang,$p){
		$this->language=array(
		'english'=>array('ALIGN'=>"and",'first'=>"",'end'=>" ago",'year'=>" YEAR year_SUM ",'month'=>" MONTH month_SUM ",'day'=>" DAY day_SUM  ",'hours'=>" HOUR hour_SUM ",'minutes'=>" MIN minute_SUM  ",'seconds'=>" SEC second_SUM   "),
		'french'=>array('ALIGN'=>"et",'first'=>"Il y a ",'end'=>"",'year'=>" YEAR an_SUM ",'month'=>" MONTH mois ",'day'=>" DAY jour_SUM  ",'hours'=>" HOUR heure_SUM ",'minutes'=>" MIN minute_SUM  ",'seconds'=>" SEC seconde_SUM   ")
		
		);
return $this->language[$lang][$p] ;
		
	}
	function __Ago($tmp,$lang){
		$time=array(
	's'=>'seconds',
	'm'=>'minutes',
	'h'=>'hours',
	'd'=>'day',
	'o'=>'month',
	'y'=>'year'
	);$mag=array(
	's'=>'SEC',
	'm'=>'MIN',
	'h'=>'HOUR',
	'd'=>'DAY',
	'o'=>'MONTH',
	'y'=>'YEAR'
	);
	$i = 0;
$len = count($tmp);
	foreach($tmp as $k=>$v){
		if($v > 0){
			$k2=$time[$k];
			$k3=$mag[$k];
			$rv=str_replace($k3,$v,$this->__Lang($lang,$k2));
			$And[]=$this->__Lang($lang,'ALIGN');
			$first[]=$this->__Lang($lang,'first');
			$end[]=$this->__Lang($lang,'end');
			switch (true){
				case($v > 1):
				$rv=str_replace("_SUM","s",$rv);
				break;
				case($v < 2):
				$rv=str_replace("_SUM","",$rv);
				break;
				
			}
	$r["$k2"]=$rv;
	}
	}
	$res=implode("and",$r);
	
	$len = count($r);
	if($len >= 2){
		$res2=explode("and",$res);
		$n=count($res2);
		return $first[0].$res2[$n-1].' '.$And[0].' '.$res2[$n-2].$end[0];
	}else{
		return $first[0].$res.$end[0];
	}
		
	}
	public function __convert($date1,$lang){
		$date2=time(); //current time
   $diff = abs($date1 - $date2); // abs to have the absolute value, so avoid having a negative difference
    $Data = array();
    $tmp = $diff;
    $Data['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $Data['second']) /60 );
    $Data['minute'] = $tmp % 60;
  
    $tmp = floor( ($tmp - $Data['minute'])/60 );
    $Data['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $Data['hour'])  /24 );
    $Data['day'] = $tmp % 30;
	$tmp_month = floor( ($tmp - $Data['day'])  /30 );
    $Data['month'] = $tmp_month % 12;
	$tmp_year = floor( ($tmp_month - $Data['month'])  /12 );
	$Data['year'] = $tmp_year;
	$get=array(
	's'=>$Data['second'],
	'm'=>$Data['minute'],
	'h'=>$Data['hour'],
	'd'=>$Data['day'],
	'o'=>$Data['month'],
	'y'=>$Data['year']
	);
	$d=$this->__Ago($get,$lang);

	return $d;

}
}
