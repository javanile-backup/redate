<?php
/**
 *
 *
 */

namespace Javanile\Dating;

class Dating
{	
	/**
     *
     * @param type $date
     * @param type $from
     * @param type $to
     * @return string
     */
	public static function convert($date, $from, $to)
    {
		// avoid manipulate insignificant date
		if ($date == '0000-00-00' || !$date) {
			return '';
		}
		
		//
		$i = array();
		$d = array();
		$t = 0;
					
		// parse input
		switch($from) {
			
			//
			case 'it':
				$i = explode('/',$date);
				$d['Y'] = (int) @$i[2];  
				$d['m'] = (int) @$i[1];  
				$d['d'] = (int) @$i[0];
				$t = @strtotime($d['Y'].'-'.$d['m'].'-'.$d['d']);
				break;

			//
			case 'm/d/Y':
				$i = explode('/',$date);
				$d['Y'] = (int) @$i[2];  
				$d['m'] = (int) @$i[0];  
				$d['d'] = (int) @$i[1];
				$t = @strtotime($d['Y'].'-'.$d['m'].'-'.$d['d']);
				break;

			//
			case 'mysql':
				$t = @strtotime($date);
				break;			
		}
		
		// build output
		switch($to) {
			
			//
			case 'mysql': 
				return @date('Y-m-d',$t);				
		
			//	
			case 'it':
				return @date('d/m/Y',$t);
				
			//
			default:
				return $date;
		}				
	}	
}