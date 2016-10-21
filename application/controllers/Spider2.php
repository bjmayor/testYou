<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit','512M');
class Spider2 extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('relation2_model','relation_model');
        $this->load->model('district2_model','district_model');
    }

    public function province()
    {
        $content =  file_get_contents("http://youbian.911cha.com/");
        if(preg_match_all('~<li><a href="./a_([a-zA-Z]*).html">(.*?)邮编</a></li>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                //台湾的特殊,单独抓取，地址不一样,http://taiwanpc.911cha.com/
                if($i>=33)
                {
                    break;
                }
                $this->relation2_model->insert_district($matches[2][$i],$matches[2][$i],$matches[1][$i],Relation2_model::PROVINCE);
            }
        }
        else
        {
            echo "no match";
        }
    }

    public function list_all_province()
    {
        $res = $this->relation2_model->get_district_by_level(Relation2_model::PROVINCE);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }


    }

    public function list_all_city()
    {
        $res = $this->relation_model->get_district_by_level(Relation2_model::CITY);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_directcity()
    {
        $res = $this->relation_model->get_district_by_level(Relation2_model::DIRECT_CITY);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }
    public function list_all_directtown()
    {
        $res = $this->relation_model->get_district_by_level(Relation2_model::CITY_REGION);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_countytown()
    {
        $res = $this->relation_model->get_district_by_level(Relation2_model::COUNTYTOWN);
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


    /**
     * 获取city列表
     */
    public function city($province_id)
    {
        //直辖市玩特殊
        $province_info = $this->relation_model->get_district($province_id);
        $url = "http://youbian.911cha.com/a_".$province_info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<li><a href="./a_([a-zA-Z]*).html" class="green">(.*?)邮编</a></li>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation2_model->insert_district($matches[2][$i],$province_info['fullname'].$matches[2][$i],$matches[1][$i],Relation2_model::CITY,$province_id,0,$province_id);
            }
        }
        else
        {
            echo "no match\n";
        }
    }

    public function cityregion($province_id)
    {
        //直辖市玩特殊
        $province_info = $this->relation_model->get_district(array("id"=>$province_id));
        $url = "http://youbian.911cha.com/a_".$province_info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<li><a href="./a_([a-zA-Z]*).html">(.*?)邮编</a></li>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$province_info['fullname'].$matches[2][$i],$matches[1][$i],Relation2_model::CITY_REGION,$province_id,0,$province_id);
            }
        }
        else
        {
            echo "no match\n";
        }
    }

    public function countrytown($city_id)
    {
        $city_info= $this->relation_model->get_district(array("id"=>$city_id));
        $url = "http://youbian.911cha.com/a_".$city_info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<li><a href="./a_([a-zA-Z]*).html">(.*?)邮编</a></li>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$city_info['fullname'].$matches[2][$i],$matches[1][$i],Relation2_model::COUNTYTOWN,$city_id,$city_info['pid'],$city_info['rid']);
            }
        }
        else
        {
            echo "no match\n";
        }

    }


    public function getlast($townid)
    {
        $info= $this->relation_model->get_district(array("id"=>$townid));
        if($info['rid'] == 367)
        {
            return;
        }
        $url = "http://youbian.911cha.com/a_".$info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(empty($content))
        {
            echo "needtry whole:$townid \n";
            return;
        }
        $lastpage=1;
        if(preg_match('~<a href="a_'.$info['pingyin'].'_(\d*).html">末页</a>~',$content,$matches))
        {
            $lastpage = $matches[1];
            echo $lastpage;
        }
        for($page=1;$page<=$lastpage;$page++)
        {
            $url = "http://youbian.911cha.com/a_".$info['pingyin']."_".$page.".html";
            $content  = file_get_contents($url);
            if(!preg_match('~<style>\.([a-zA-Z0-9]*)\{~',$content,$matches))
            {
                continue;
            }
            $class=$matches[1];
            if(preg_match_all('~<tr align="center"><td align="left"><a href="[^"]*">([^<]*)</a></td>.*?<td class="'.$class.'"><a href="[^"]*">(\d*)</a></td>.*?<td><a href="[^"]*">(\d*)</a>~',$content,$matches)) {
                for($i=0;$i<count($matches[0]);$i++)
                {
                    $id = $this->relation_model->insert_district($matches[1][$i],$matches[1][$i],"",7,$townid,$info['pid'],$info['rid']);
                    if($id)
                    {
                        $this->district_model->insert_district(array("id"=>$id,
                            "name"=>$matches[1][$i],
                            "fullname"=>$matches[1][$i],
                            "zip_code"=>$matches[2][$i],
                            "long_distance_area_code"=>$matches[3][$i],
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

    public function fix($townid,$page)
    {
        $info= $this->relation_model->get_district(array("id"=>$townid));
        if($info['rid'] == 367)
        {
            return;
        }
        $url = "http://youbian.911cha.com/a_".$info['pingyin'].".html";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(empty($content))
        {
            echo "needtry whole:$townid \n";
            return;
        }
        $lastpage=1;
        if(preg_match('~<a href="a_'.$info['pingyin'].'_(\d*).html">末页</a>~',$content,$matches))
        {
            $lastpage = $matches[1];
            echo $lastpage;
        }
        $url = "http://youbian.911cha.com/a_".$info['pingyin']."_".$page.".html";
        $content  = file_get_contents($url);
        if(!preg_match('~<style>\.([a-zA-Z0-9]*)\{~',$content,$matches))
        {
            continue;
        }
        $class=$matches[1];
        if(preg_match_all('~<tr align="center"><td align="left"><a href="[^"]*">([^<]*)</a></td>.*?<td class="'.$class.'"><a href="[^"]*">(\d*)</a></td>.*?<td><a href="[^"]*">(\d*)</a>~',$content,$matches)) {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $id = $this->relation_model->insert_district($matches[1][$i],$matches[1][$i],"",7,$townid,$info['pid'],$info['rid']);
                if($id)
                {
                    $this->district_model->insert_district(array("id"=>$id,
                        "name"=>$matches[1][$i],
                        "fullname"=>$matches[1][$i],
                        "zip_code"=>$matches[2][$i],
                        "long_distance_area_code"=>$matches[3][$i],
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
