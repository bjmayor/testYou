<?php
/**
 * 区域信息
 *
 * @author 415074476@qq.com
 * @version $Id$
 * @copyright 415074476@qq.com, 06 一月, 2016
 * @package default
 **/

/**
 * Define DocBlock
 */
class District_model extends MY_Model {
    public static $TBNAME="district_info";
    public $id;//id
    public $name;//名字
    public $fullname;//地址全称
    public $area;//面积
    public $population;//人口
    public $admin_code;//行政代码
    public $admin_code_pre;//代码前6位
    public $long_distance_area_code;//长途区号
    public $zip_code;//邮政编码
    public $car_no_pre;//车牌号码
    public $admin_level;//行政级别
    public $desc;//描述
    public $population_density;//人口密度
    public $create_datetime;//创建时间
    public $update_datetime;//更新时间

    const PROVINCE = 0;//省
    const DIRECT_CITY = 1;//直辖市

    const CITY= 2;//市,地级市

    const CITY_REGION= 3;//市辖区-
    const COUNTYTOWN= 4;//县,其实和市辖区是同级别的。

    const TOWN= 5;//镇->县
    const STREET= 6;//街道->市辖区

    const VILLAGE= 7;//村
    const COMMUNITY= 8;//社区


    public function admin_level_str_to_code($admin_level_str)
    {
        switch(trim($admin_level_str))
        {
        case "地级市":
            return self::CITY;
        case "市辖区":
            return self::CITY_REGION;
        case "街道":
            return self::STREET;
        case "县":
            return self::COUNTYTOWN;
        case "社区":
            return self::COMMUNITY;
        case "镇":
            return self::TOWN;
        default:
            return -1;
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    public function insert_district($options = array())
    {
        if(!$this->_required(array('id'),$options))
        {
            return false;
        }
        $qualificationArray = array('id','name', 'fullname', 'desc','area','population','area_code','admin_code','admin_code_pre','long_distance_area_code','zip_code','car_no_pre','admin_level','population_density');
        $data = array();
        foreach($qualificationArray as $qualifier)
        {
            if(isset($options[$qualifier])) 
                $data[$qualifier] = $options[$qualifier];
        }
        $data['create_datetime'] = date('Y-m-d H:i:s');
        $data['update_datetime'] = date('Y-m-d H:i:s');
        $this->db->insert(self::$TBNAME,$data);
        return $this->db->affected_rows();
    }

    public function get_district($id)
    {
        $query = $this->db->get_where(self::$TBNAME,array("id"=>$id));
        return $query->row_array();
    }

    public function get_district_by_level($level)
    {
        $query = $this->db->get_where(self::$TBNAME,array("admin_level"=>$level));
        return $query->result_array();

    }


}
?>
