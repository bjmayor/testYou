<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit','512M');
class Spider_tw extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('relation2_model','relation_model');
        $this->load->model('district2_model','district_model');
    }

    public function province()
    {
        $this->relation_model->insert_district('台湾','台湾','taiwan',Relation2_model::PROVINCE);
    }

    public function list_all_province()
    {
        echo 367,"\n";
    }

    public function list_all_city()
    {
        $res = $this->relation_model->get_district(array("pid"=>367));
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_countytown()
    {
        $res = $this->relation_model->get_district(array("ppid"=>367));
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }




    public function city($province_id)
    {
        //直辖市玩特殊
        $province_info = $this->relation_model->get_district(array("id"=>$province_id));
        $url = "http://taiwanpc.911cha.com/";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<h3><a href="./diqu_([a-zA-Z]*).html">(.*?)邮编</a></h3>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$province_info['fullname'].$matches[2][$i],$matches[1][$i],Relation2_model::CITY,$province_id,0,$province_id);
            }
        }
        else
        {
            echo "no match\n";
        }
    }


    //从市级抓取县级数据
    public function countrytown($city_id,$next_admin_level)
    {
        $city_info= $this->relation_model->get_district(array("id"=>$city_id));
        $province_info= $this->relation_model->get_district($city_info['rid']);
        $url = "http://taiwanpc.911cha.com/diqu_".$city_info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(empty($content))
        {
            echo "needtry:$city_id $next_admin_level \n";
            return;
        }
        $desc="";
        if(preg_match_all('~<li><a href="./diqu_([0-9]*).html">(.*?)邮编</a></li>~',$content,$matches)) {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$city_info['fullname'].$matches[2][$i],$matches[1][$i],$next_admin_level,$city_id,$city_info['pid'],$city_info['rid']);
            }
        }
        else
        {
            echo "no  list  match\n";
        }
    }

    public function getlast($townid)
    {
        $info= $this->relation_model->get_district(array("id"=>$townid));
        $province_info= $this->relation_model->get_district(array("id"=>$info['rid']));
        $url = "http://taiwanpc.911cha.com/diqu_".$info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(empty($content))
        {
            echo "needtry:$townid\n";
            return;
        }
        $lastpage=1;
        if(preg_match('~<a href="./diqu_'.$info['pingyin'].'_p(\d*).html">末页</a>~',$content,$matches))
        {
            $lastpage = $matches[1];
            echo "totalpage:$lastpage \n";
        }
        //第一页之前已经抓取。这里从第二页抓起、
        for($page=1;$page<=$lastpage;$page++)
        {
            $url = "http://taiwanpc.911cha.com/diqu_".$info['pingyin']."_p".$page.".html";
            echo $url,"\n";
            $content = file_get_contents($url);
            if(preg_match_all('~<tr align="center"><td align="left"><a href="[^"]*" target="_blank">([^<]*)</a></td><td><a href="[^"]*" target="_blank">(\d*)</a></td><td>~',$content,$matches)) {
                for($i=0;$i<count($matches[0]);$i++)
                {
                    $id = $this->relation_model->insert_district($matches[1][$i],$matches[1][$i],"",7,$townid,$info['pid'],$info['rid']);
                    if($id)
                    {
                        $this->district_model->insert_district(array("id"=>$id,
                            "name"=>$matches[1][$i],
                            "fullname"=>$matches[1][$i],
                            "zip_code"=>$matches[2][$i],
                            "admin_level"=>7,
                        ));
                    }
                    else
                    {
                        echo "insert relation error\n";
                    }
                }
            }
            else
            {
                echo "no  list  match\n";
            }

        }

    }

    function fix($townid,$page)
    {
        $info= $this->relation_model->get_district(array("id"=>$townid));
        $province_info= $this->relation_model->get_district(array("id"=>$info['rid']));
        $url = "http://taiwanpc.911cha.com/diqu_".$info['pingyin']."_p".$page.".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<tr align="center"><td align="left"><a href="[^"]*" target="_blank">([^<]*)</a></td><td><a href="[^"]*" target="_blank">(\d*)</a></td><td>~',$content,$matches)) {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $id = $this->relation_model->insert_district($matches[1][$i],$matches[1][$i],"",7,$townid,$info['pid'],$info['rid']);
                if($id)
                {
                    $this->district_model->insert_district(array("id"=>$id,
                        "name"=>$matches[1][$i],
                        "fullname"=>$matches[1][$i],
                        "zip_code"=>$matches[2][$i],
                        "admin_level"=>7,
                    ));
                }
                else
                {
                    echo "insert relation error\n";
                }
            }
        }
        else
        {
            echo "no  list  match\n";
        }


    }
}
?>
