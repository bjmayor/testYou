<?php/** *答案选项 * * @author shunping.liu@huangjinqianbao.com * @version $Id$ * @copyright shunping.liu@huangjinqianbao.com, 06 一月, 2016 * @package default **/class Answer_model extends MY_Model {    public static $TBNAME = "answer";    public $id;//自增id    //通过问题编号及答案标签直接对应结论,单选题和跳转题可以直接得出结论    public $question_id;//对应的问题编号    public $result_label;//结论标签。    public $sub_question_id;//对应的子问题编号,用于筛选答案    public $score;//分数,对应于计分题    public $next_question_label;//下一个子问题，默认为空。空表示分数类和单选类问题。有值表示跳转类问题。    public $label;//答案编号,显示给用户看    public $answer_text;//答案文本    public $answer_img;//答案图片            public function __construct()    {        $this->load->database();    }    /*    *创建一个答案    */     public function insert_answer($options=array())     {         if(!$this->_required(array('question_id','answer_text','label'), $options))         {             return false;         }         $qualificationArray = array('question_id', 'result_label','score','next_question_label','label','answer_text','answer_img');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->set($qualifier, $options[$qualifier]);         }         $this->db->insert(self::$TBNAME);         return $this->db->insert_id();     }    /*    *更新answer    */     public function update_answer($options=array())     {         if(!$this->_required(array('question_id','answer_text','label'),$options))         {             return false;         }         $qualificationArray = array('question_id', 'result_label','score','next_question_label','label','answer_text','answer_img');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->set($qualifier, $options[$qualifier]);         }         if(isset($options['id']))         {             $this->db->where('id', $options['id']);         }          if(isset($options['question_id']) && isset($options['label']))         {             $this->db->where('question_id', $options['question_id']);             $this->db->where('label', $options['label']);         }        $this->db->update(self::$TBNAME);         return $this->db->affected_rows();      }    /**    *删除答案    */     public function delete_answer($options = array())     {         if(!$this->_required(array('id'), $options)) return false;        // Add where clauses to query         $qualificationArray = array('id', 'label', 'question_id');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->where($qualifier, $options[$qualifier]);         }         $this->db->delete(self::$TBNAME);          return $this->db->affected_rows();     }    /*    *读取result    */     public function get_answer($options=array())     {         // default values         $options = $this->_default(array('sort_direction' => 'asc'), $options);         // Add where clauses to query         $qualificationArray = array('id', 'label', 'question_id','sub_question_id');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->where($qualifier, $options[$qualifier]);         }         if(isset($options['limit']) && isset($options['offset']))              $this->db->limit($options['limit'], $options['offset']);         else if(isset($options['limit'])) $this->db->limit($options['limit']);         // sort         if(isset($options['sort_by']))              $this->db->order_by($options['sort_by'], $options['sort_direction']);         $query = $this->db->get(self::$TBNAME);         if($query->num_rows() == 0) return false;         if(isset($options['id']) )         {             return $query->result_row();         }         else         {             return $query->result_array();         }     }}?>