<?php/** * 媒体类，用于seo检索 * * @author shunping.liu@huangjinqianbao.com * @version $Id$ * @copyright shunping.liu@huangjinqianbao.com, 06 一月, 2016 * @package default **//** * Define DocBlock *//class Meta_model extends CI_Model {    public static $TBNAME="meta";    public $id;    public $seo_title;    public $seo_description;    public function __construct()    {        parent::__construct();        $this->load->database();    }    public function insert_meta()    {        $this->seo_title = $this->input->post('seo_title');        $this->seo_description = $this->input->post('seo_description');        $this->db->insert(self::$TBNAME,$this);        return $this->db->insert_id();    }    public function update_meta()    {    }    public function get_meta_by_questionid($id)    {        $query = $this->db->get_where(self::$TBNAME,array("id"=>$id));        return $query->result();    }}?>