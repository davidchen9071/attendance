<?php 

class Attendance_m extends MY_Model {
	
		protected $_table_name = 'attendance';
		protected $_primary_key = array('subject_code', 'from_date', 'to_date', 'teacher_id');
		protected $_primary_filter = '';
		protected $_order_by = 'subject_code';
		public $_rules = array();
		protected $_timestamps = FALSE;

		public function get_distinct(){
			$q=$this->db->query("SELECT DISTINCT subject_code, from_date, to_date, total_classes FROM attendance LIMIT 20");
			return $q;
		}

		public function get_distinct_select($data){
			$query = 'SELECT DISTINCT subject_code, from_date, to_date, total_classes FROM attendance ';
			$query .= 'WHERE (from_date = ' . "'" . $data['from_date'] . "'" . ') AND (to_date = '; 
			$query .= "'" . $data['to_date'] . "'" . ')';
			$q=$this->db->query($query);
			return $q;
		}

		public function get_distinct_period(){
			$q=$this->db->query("SELECT DISTINCT from_date, to_date FROM attendance");
			if($q->num_rows>0){
				foreach($q->result() as $rows){
					$data[]=$rows;
				}
				return $data;
			}
		}
}

?>