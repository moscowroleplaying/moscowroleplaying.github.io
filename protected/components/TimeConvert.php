<?	
class TimeConvert {
	public function convert($time) {
		$ago = time() - $time;
		if($ago <= 60) $str = 'только что';
		else if($ago > 60 && $ago < 3600) $str = round($ago/60).' мин. назад';
		else if($ago < 86400) $str = round($ago/3600).' ч. назад';
		else if($ago >= 86400 && $ago < 172800) $str = 'вчера, '.date('H:i',$time);
		else $str = date('d.m.Y',$time);
		return $str; 
	}
}	
?>