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
class Meta_model extends CI_Model {
    public static $TBNAME="meta";
    public $id;//自增id
    public $seo_title;//标题
    public $seo_keywords;//关键字
    public $seo_description;//描述

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_metas()
    {
        $query = $this->db->get(self::$TBNAME);
        return $query->result_array();
    }


    public function insert_meta($seo_title,$seo_description,$seo_keywords="")
    {
        $this->seo_title = $seo_title;
        $this->seo_description = $seo_description;
        $this->seo_keywords = $seo_keywords;
        $this->db->insert(self::$TBNAME,$this);
        return $this->db->insert_id();
    }

    public function update_meta($seo_title,$seo_description,$seo_id)
    {
        $this->seo_title = $seo_title;
        $this->seo_description = $seo_description;
        $this->id = $seo_id;
        $this->db->where("id",$seo_id);
        $this->db->update(self::$TBNAME, $this);
    }

    public function get_meta($id)
    {
        $query = $this->db->get_where(self::$TBNAME,array("id"=>$id));
        return $query->row_array();
    }


}
?>

