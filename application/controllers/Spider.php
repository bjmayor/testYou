<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit','512M');
class Spider extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('relation_model');
        $this->load->model('district_model');
    }

    public function province()
    {
        $content =  file_get_contents("http://www.tcmap.com.cn/");
        $content = iconv("GBK","UTF-8",$content);
        if(preg_match_all('~<A HREF="/([^/]*)/" class=blue>([^<]*)</A>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$matches[2][$i],$matches[1][$i],Relation_model::PROVINCE);
            }
        }
        else
        {
            echo "no match";
        }
    }

    public function list_all_province()
    {
        $res = $this->relation_model->get_district_by_level(Relation_model::PROVINCE);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }


    }

    public function list_all_city()
    {
        $res = $this->relation_model->get_district_by_level(Relation_model::CITY);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_countytown()
    {
        $res = $this->relation_model->get_district_by_level(Relation_model::COUNTYTOWN);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_town()
    {
        $res = $this->relation_model->get_district_by_level(Relation_model::TOWN);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_village()
    {
        $res = $this->relation_model->get_district_by_level(array(Relation_model::VILLAGE,Relation_model::COMMUNITY));
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }


    public function city($province_id)
    {
        $province_info = $this->relation_model->get_district($province_id);
        $url = "http://www.tcmap.com.cn/".$province_info['pingyin']."/";
        echo $url,"\n";
        $content = file_get_contents($url);
        $content = iconv("GBK","utf-8//ignore",$content);
        if(preg_match_all('~<a href=/'.$province_info['pingyin'].'/([^\.]*).html target=_blank class=blue>([^<]*)</a></strong></td><td nowrap >([^<]*)</td><td\s*>([^>]*)<sup>2</sup></td><td\s*>([^<]*)</td>\s*<td\s*>([^<]*)</td>~is',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$province_info['fullname'].$matches[2][$i],$matches[1][$i],Relation_model::CITY,$province_id,0,$province_id);
            }
        }
        else
        {
            echo "no match\n";
        }
    }


    //从市级抓取县级数据
    public function district($city_id,$next_admin_level)
    {
        $city_info= $this->relation_model->get_district($city_id);
        $province_info= $this->relation_model->get_district($city_info['rid']);
        $url = "http://www.tcmap.com.cn/".$province_info['pingyin']."/".$city_info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(empty($content))
        {
            echo "needtry:$city_id $next_admin_level \n";
            return;
        }
        $content = iconv("GBK","utf-8//ignore",$content);


        $desc="";
        if(preg_match_all('~<strong><a href=/' . $province_info['pingyin'] . '/([a-zA-Z_]*).html target=_blank class=blue>([^<]*)</a></strong></td>~',$content,$matches)) {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$city_info['fullname'].$matches[2][$i],$matches[1][$i],$next_admin_level,$city_id,$city_info['pid'],$city_info['rid']);
            }
        }
        else
        {
            echo "no  list  match\n";
            if(preg_match('~<div style="margin:5px 10px 1px 10px;" class=f14>(.*?)</div>~s',$content,$matches))
            {
                $desc = $matches[1];
            }
            else 
            {
                echo "no desc found\n";
            }
        }

        if(preg_match('~<strong>行政代码</strong>:([^<]*)</td><td nowrap ><strong>代码前6位</strong>:([^<]*)</td></tr><tr bgcolor="#ffffff"><td   nowrap><strong>长途区号</strong>:([^<]*)</td><td nowrap ><strong>邮政编码</strong>:([^<]*)</td></tr><tr bgcolor="#ffffff"><td nowrap><strong>车牌号码</strong>:([^<]*)</td><td nowrap><strong>行政级别</strong>:([^<]*)</td></tr><tr bgcolor="#ffffff"><td  nowrap><strong>人口数量</strong>:([^<]*)</td><td  nowrap><strong>人口密度</strong>:([^<]*)<sup>2</sup></td></tr><tr bgcolor="#ffffff"><td   colspan="2" ><strong>辖区面积</strong>:([^<]*)</td>~',$content,$matches))
        {
            $id =  $this->district_model->insert_district(array("id"=>$city_id,
                "name"=>$city_info['name'],
                "fullname"=>$city_info['fullname'],
                "admin_code"=>$matches[1],
                "admin_code_pre"=>$matches[2],
                "long_distance_area_code"=>$matches[3],
                "zip_code"=>$matches[4],
                "car_no_pre"=>$matches[5],
                "admin_level"=>$this->district_model->admin_level_str_to_code($matches[6]),
        "population"=>$matches[7],
        "population_density"=>$matches[8],
        "area"=>$matches[9],
        "desc"=>$desc,
    ));
            if($id === false)
            {
                echo $city_id,"\n";
    }
    }
else if(preg_match('~<strong>行政代码</strong>:([^<]*)</td><td nowrap ><strong>代码前6位</strong>:([^<]*)</td></tr><tr bgcolor="#ffffff"><td   nowrap><strong>长途区号</strong>:([^<]*)</td><td nowrap ><strong>邮政编码</strong>:([^<]*)</td></tr><tr bgcolor="#ffffff"><td nowrap><strong>车牌号码</strong>:([^<]*)</td><td nowrap><strong>行政级别</strong>:([^<]*)</td>~',$content,$matches))
{
    $id =  $this->district_model->insert_district(array("id"=>$city_id,
        "name"=>$city_info['name'],
        "fullname"=>$city_info['fullname'],
        "admin_code"=>$matches[1],
        "admin_code_pre"=>$matches[2],
        "long_distance_area_code"=>$matches[3],
        "zip_code"=>$matches[4],
        "car_no_pre"=>$matches[5],
        "admin_level"=>$this->district_model->admin_level_str_to_code($matches[6]),
        "desc"=>$desc,
    ));
    if($id === false)
    {
        echo $city_id,"\n";
    }

    }
else
{
    echo "page content nomatch\n";
    }


    }
    }
?>
