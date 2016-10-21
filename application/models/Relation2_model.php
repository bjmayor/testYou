<?php
/**
 * 地区关系类，数据采集自 http://youbian.911cha.com/
 *
 * @author shunping.liu@huangjinqianbao.com
 * @version $Id$
 * @copyright shunping.liu@huangjinqianbao.com, 06 一月, 2016
 * @package default
 **/

/**
 * Define DocBlock
 */
class Relation2_model extends CI_Model {
    public static $TBNAME="district_relation2";
    public $id;//自增id
    public $name;//名字
    public $fullname;//地址全称
    public $pingyin;//拼音
    public $admin_level;//行政级别
    public $pid;//父id
    public $ppid;//父父id
    public $rid;//根id

    const PROVINCE = 0;//省
    const DIRECT_CITY = 1;//直辖市

    const CITY= 2;//市,地级市

    const CITY_REGION= 3;//市辖区-
    const COUNTYTOWN= 4;//县,其实和市辖区是同级别的。

    const TOWN= 5;//镇->县
    const STREET= 6;//街道->市辖区

    const VILLAGE= 7;//村
    const COMMUNITY= 8;//社区


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    public function insert_district($name,$fullname,$pingyin,$admin_level,$pid=0,$ppid=0,$rid=0)
    {
        $this->name = $name;
        $this->fullname = $fullname;
        $this->pingyin= $pingyin;
        $this->admin_level= $admin_level;
        $this->pid= $pid;
        $this->ppid= $ppid;
        $this->rid = $rid;
        $this->db->insert(self::$TBNAME,$this);
        return $this->db->insert_id();
    }


    public function get_district($options=array())
    {
        $candidate = array('id','pid','ppid','rid','pingyin','admin_level','name');
         foreach($candidate as $qualifier)
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

         if(isset($options['id']) )
         {
             return $query->row_array();
         }
         else
         {
             return $query->result_array();
         }
    }

    public function get_district_by_level($level)
    {
        if(!is_array($level))
        {
            $level = array($level);
        }
        $query = $this->db->where_in("admin_level",$level)->get(self::$TBNAME);
        return $query->result_array();
    }


}
?>

