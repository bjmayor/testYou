<?php/** *  * * @author shunping.liu@huangjinqianbao.com * @version $Id$ * @copyright shunping.liu@huangjinqianbao.com, 06 一月, 2016 * @package default **/class Question_model extends MY_Model {    public static $TBNAME="question";    public $id;//自增id    public $pid;//父问题id    public $title;//问题    public $description;//问题描述    public $img;//问题图片    public $meta_id;//媒体id    public $question_type;//问题类型，1单选,2算分,3跳转    public $question_category_id;//分类id    public $create_time;//创建时间    public $update_time;//更新时间    public $publish_status;//发布状态 -1 未发布；0  正常;1删除    public $visit_count;//访问数量    public $label;//子问题编号,显示给用户看    public $is_recommend;//是否是编辑推荐，用于产生精品列表    public function __construct()    {        $this->load->database();    }    /*     * 创建基本问题     */    public function insert_question($options = array())    {          if(!$this->_required(array('title','description'),$options))         {             return false;         }        $qualificationArray = array('pid', 'title', 'description','img','next_id','pre_id','meta_id','question_type','question_category_id','publish_status','visit_count','label');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->set($qualifier, $options[$qualifier]);         }         $this->db->set('update_time','now()');          $this->db->insert(self::$TBNAME);         return $this->db->insert_id();           }    public function update_question($options = array())    {        if(!$this->_required(array("id"),$options))            return false;        $qualificationArray = array('pid', 'title', 'description','img','next_id','pre_id','meta_id','question_type','question_category_id','publish_status','visit_count','label');        foreach($qualificationArray as $qualifier)        {            if(isset($options[$qualifier]))                 $this->db->set($qualifier, $options[$qualifier]);        }        $this->db->set('update_time',"NOW()");        $this->db->where('id',$options['id']);        $this->db->update(self::$TBNAME);        return $this->db->affected_rows();            }    public function delete_question($options = array())    {        if(!$this->_required(array("question_id"),$options))            return false;        $this->db->where('id',$options['question_id']);        $this->db->delete(self::$TBNAME);        return $this->db->affected_rows();    }    public function get_question($options = array())    {        // default values         $options = $this->_default(array('sort_direction' => 'asc'), $options);         // Add where clauses to query         $qualificationArray = array('id', 'description', 'title','is_recommend','visit_count','pid');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->where($qualifier, $options[$qualifier]);         }         if(isset($options['limit']) && isset($options['offset']))              $this->db->limit($options['limit'], $options['offset']);         else if(isset($options['limit'])) $this->db->limit($options['limit']);         // sort         if(isset($options['sort_by']))              $this->db->order_by($options['sort_by'], $options['sort_direction']);         $query = $this->db->get(self::$TBNAME);         if($query->num_rows() == 0) return false;         if(isset($options['id']) )         {             return $query->row_array();         }         else         {             return $query->result_array();         }    }    /**     * 获取分页结果     */    public function getPage($page,$num,$category, $publish_status=0)    {        var_dump(func_get_args());        $query = $this->db->get_where(self::$TBNAME,array("question_category_id"=>$category),$num,($page-1)*$num);        return $query->result_array();    }}?>