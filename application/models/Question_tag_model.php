<?php/** * 标签管理 * * @author shunping.liu@huangjinqianbao.com * @version $Id$ * @copyright shunping.liu@huangjinqianbao.com, 12 一月, 2016 * @package default **//** * Define DocBlock *// class Question_tag_model extends MY_Model {     public static $TBNAME = "question_tag";     public $id;//自增id     public $description;//描述     public $quesiton_id;//问题编号，一个问题可以有多个tag    /*    *创建一个tab    */     public function insert_tag($options=array())     {         if(!$this->_required(array('question_id'))         {             return false;         }         $qualificationArray = array('description', 'question_id');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->set($qualifier, $options[$qualifier]);         }         $this->db->insert(self::$TBNAME);         return $this->db->last_insert_id();     }    /*    *读取一个tag    */     public function update_tag($options=array())     {         if(!$this->_required(array('tag_id'), $options)) return false;         $qualificationArray = array('description', 'question_id');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->set($qualifier, $options[$qualifier]);         }         $this->db->where('id', $options['tag_id']);         $this->db->update(self::$TBNAME);         return $this->db->affected_rows();      }    /**    *删除tag    */     public function delete_tag($options = array())     {         if(!$this->_required(array('tag_id'), $options)) return false;         $this->db->where('id', $options['tag_id']);         $this->db->delete(self::$TBNAME);      }    /*    *读取tag    */     public function get_tag($options=array())     {         // default values         $options = $this->_default(array('sort_direction' => 'asc'), $options);         // Add where clauses to query         $qualificationArray = array('id', 'description', 'question_id');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->where($qualifier, $options[$qualifier]);         }         if(isset($options['limit']) && isset($options['offset']))              $this->db->limit($options['limit'], $options['offset']);         else if(isset($options['limit'])) $this->db->limit($options['limit']);         // sort         if(isset($options['sort_by']))              $this->db->order_by($options['sort_by'], $options['sort_direction']);         $query = $this->db->get(self::$TBNAME);         if($query->num_rows() == 0) return false;         if(isset($options['id']) )         {             return $query->row(0);         }         else         {             return $query->result();         }     } }