<?php
class m_location extends CI_Model{
	
	function update_location($lat, $lon, $bus_id){
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where(array('bus_id'=>$bus_id));
		$query = $this->db->get();

		if($query->num_rows() > 0){
			$target = array(
				'latitude' => $lat,
				'longitude' => $lon
			);
			$this->db->where(array('bus_id' => $bus_id));
			$this->db->update('location', $target);
		}else{
			$target = array(
				'bus_id' => $bus_id,
				'latitude' => $lat,
				'longitude' => $lon
			);
			$this->db->insert('location', $target);
		}

	}
}
?>
