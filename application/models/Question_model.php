<?php/** *  * * @author shunping.liu@huangjinqianbao.com * @version $Id$ * @copyright shunping.liu@huangjinqianbao.com, 06 一月, 2016 * @package default **/class Question_model extends MY_Model {    public static $TBNAME="question";    public $id;//自增id    public $pid;//父问题id    public $title;//问题    public $description;//问题描述    public $img;//问题图片    public $meta_id;//媒体id    public $question_type;//问题类型，1单选,2算分,3跳转    public $question_category_id;//分类id    public $create_time;//创建时间    public $update_time;//更新时间    public $publish_status;//发布状态 -1 未发布；0  正常;1删除    public $visit_count;//访问数量    public $label;//子问题编号,显示给用户看    public $is_recommend;//是否是编辑推荐，用于产生精品列表    public function __construct()    {        $this->load->database();    }    /*     * 创建基本问题     */    public function insert_question($options = array())    {          if(!$this->_required(array('title'),$options))         {             return false;         }        $qualificationArray = array('pid', 'title', 'description','img','next_id','pre_id','meta_id','question_type','question_category_id','publish_status','visit_count','label');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->set($qualifier, $options[$qualifier]);         }         $this->db->set('update_time',date('Y-m-d H:i:s'));          $this->db->insert(self::$TBNAME);         return $this->db->insert_id();           }    public function update_question($options = array())    {        if(!$this->_required(array("id"),$options))            return false;        $qualificationArray = array('pid', 'title', 'description','img','next_id','pre_id','meta_id','question_type','question_category_id','publish_status','visit_count','label');        foreach($qualificationArray as $qualifier)        {            if(isset($options[$qualifier]))                 $this->db->set($qualifier, $options[$qualifier]);        }        $this->db->set('update_time',date('Y-m-d H:i:s'));        $this->db->where('id',$options['id']);        $this->db->update(self::$TBNAME);        return $this->db->affected_rows();            }    public function delete_question($options = array())    {        if(!$this->_required(array("id"),$options))            return false;        $this->db->where('id',$options['id']);        $this->db->delete(self::$TBNAME);        return $this->db->affected_rows();    }    public function get_question($options = array())    {        // default values         $options = $this->_default(array('sort_direction' => 'asc'), $options);         // Add where clauses to query         $qualificationArray = array('id', 'description', 'title','is_recommend','visit_count','pid');         foreach($qualificationArray as $qualifier)         {             if(isset($options[$qualifier]))                  $this->db->where($qualifier, $options[$qualifier]);         }         if(isset($options['limit']) && isset($options['offset']))              $this->db->limit($options['limit'], $options['offset']);         else if(isset($options['limit'])) $this->db->limit($options['limit']);         // sort         if(isset($options['sort_by']))              $this->db->order_by($options['sort_by'], $options['sort_direction']);         $query = $this->db->get(self::$TBNAME);         if($query->num_rows() == 0) return false;         if(isset($options['id']) )         {             return $query->row_array();         }         else         {             return $query->result_array();         }    }    public function get_page_total($num,$category, $publish_status=0,$keyword='')    {        if($keyword!='')        {            return ceil($this->db->from(self::$TBNAME)->where(array("question_category_id"=>$category,"pid!="=>'NULL'))->count_all_results()/$num);        }        else        {            return ceil($this->db->from(self::$TBNAME)->where(array("question_category_id"=>$category,"pid!="=>'NULL'))->like('title',$keyword)->count_all_results()/$num);        }    }    /**     * 获取分页结果     */    public function get_page($page,$num,$category, $publish_status=0,$keywords='')    {        $this->db->order_by("create_time","desc");        $query = $this->db->get_where(self::$TBNAME,array("question_category_id"=>$category,"pid!="=>'NULL'),$num,($page-1)*$num);        $questions = $query->result_array();        $ids = array();        foreach($questions  as $key=>  $question)        {            $ids[] = $question['id'];            $questions[$key]['subquestions']= 0;        }        if(count($ids)>0)        {            $query = $this->db->select("count(*) as subquestions,pid")->from(self::$TBNAME)->where_in("pid",$ids)->group_by("pid")->get();            $count = $query->result_array();             foreach($questions as $key=> $question)            {                foreach($count as $c)                {                    if($question['id'] == $c['pid'])                    {                        $questions[$key]['subquestions']= $c['subquestions'];                    }                }            }        }        return $questions;    }}?>