<?php
class Result_model extends MY_Model {
    public static $TBNAME = "result";
    public $id;//自增id
    //通过问题编号及结论编号来对应唯一对应。单选题及跳转题可以得到结论
    public $label;//结论编号。
    public $question_id;// 答案对应的问题编号
    
    public $score_start;//起始分数
    public $score_end;//结束分数,分数区间用于计算结果。对应于计分问题。

   
    public $show_text_result;//显示给用户的结果
    public $show_img_result;//显示给用户的图片
    public $show_people_count;//同样答案的人数


    /*
    *创建一个result
    */
     public function insert_result($options=array())
     {
         if(!$this->_required(array('question_id','show_text_result','label'),$options))
         {
             return false;
         }

         $qualificationArray = array('show_text_result', 'question_id','label','show_img_result','score_start','score_end','show_html_result');
         foreach($qualificationArray as $qualifier)
         {
             if(isset($options[$qualifier])) 
                 $this->db->set($qualifier, $options[$qualifier]);
         }

         $this->db->insert(self::$TBNAME);
         return $this->db->insert_id();
     }

    public function get_result_by_score($question_id,$score)
    {
        $query = $this->db->where(self::$TBNAME,array('question_id'=>$question_id,'score_start<='=>$score,'score_end>'=>$score));
        return $query->result_row();
    }

    public function get_result_by_label($question_id,$label)
    {
        return $this->get_result(array('question_id'=>$question_id,"label"=>$label));
    }

    /*
    *更新result
    */
     public function update_result($options=array())
     {

         $qualificationArray = array('show_text_result', 'question_id','label','show_img_result','score_start','score_end','show_html_result');
         foreach($qualificationArray as $qualifier)
         {
             if(isset($options[$qualifier])) 
                 $this->db->set($qualifier, $options[$qualifier]);
         }
         if(isset($options['id']))
         {
             $this->db->where('id', $options['id']);
         }
         else if(isset($options['question_id']) && isset($options['label']))
         {
             $this->db->where('question_id', $options['question_id']);
             $this->db->where('label', $options['label']);
         }
        $this->db->update(self::$TBNAME);
         return $this->db->affected_rows(); 
     }

    /**
    *删除result
    */
     public function delete_result($options = array())
     {
         if(!$this->_required(array('id'), $options)) return false;

        // Add where clauses to query
         $qualificationArray = array('id', 'label', 'question_id');
         foreach($qualificationArray as $qualifier)
         {
             if(isset($options[$qualifier])) 
                 $this->db->where($qualifier, $options[$qualifier]);
         }
         $this->db->delete(self::$TBNAME); 
         return $this->db->affected_rows(); 
     }

    /*
    *读取result
    */
     public function get_result($options=array())
     {
         // default values
         $options = $this->_default(array('sort_direction' => 'asc'), $options);

         // Add where clauses to query
         $qualificationArray = array('id', 'label', 'question_id');
         foreach($qualificationArray as $qualifier)
         {
             if(isset($options[$qualifier])) 
                 $this->db->where($qualifier, $options[$qualifier]);
         }

         if(isset($options['limit']) && isset($options['offset'])) 
             $this->db->limit($options['limit'], $options['offset']);
         else if(isset($options['limit'])) $this->db->limit($options['limit']);

         // sort
         if(isset($options['sort_by'])) 
             $this->db->order_by($options['sort_by'], $options['sort_direction']);

         $query = $this->db->get(self::$TBNAME);
         if($query->num_rows() == 0) return false;

         if(isset($options['id']) || (isset($options['question_id']) && isset($options['label'])))
         {
             return $query->row_array();
         }
         else
         {
             return $query->result_array();
         }
     }

}
?>

