<?php
/**
 * 媒体类，用于seo检索
 *
 * @author shunping.liu@huangjinqianbao.com
 * @version $Id$
 * @copyright shunping.liu@huangjinqianbao.com, 06 一月, 2016
 * @package default
 **/

/**
 * Define DocBlock
 */
class Relation_model extends CI_Model {
    public static $TBNAME="district_relation";
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

    public function get_district($id)
    {
        $query = $this->db->get_where(self::$TBNAME,array("id"=>$id));
        return $query->row_array();
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

