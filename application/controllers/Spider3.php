<?php
/*
 * 抓取http://post.8684.cn/
 *
 */ 
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit','512M');
class Spider3 extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('relation3_model','relation_model');
        $this->load->model('district3_model','district_model');
    }

    public function province()
    {
        $content =  file_get_contents("http://post.8684.cn/");
        preg_match('~<div class="post_list">(.*?)</div>~sm',$content,$matches);
        var_dump($matches);
        $content = $matches[1];
        if(preg_match_all('~<a href="/s(\d*).htm">(.*?)</a>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $this->relation_model->insert_district($matches[2][$i],$matches[2][$i],$matches[1][$i],Relation3_model::PROVINCE);
            }
        }
        else
        {
            echo "no match";
        }
    }

    public function list_all_province()
    {
        $res = $this->relation_model->get_district_by_level(Relation3_model::PROVINCE);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }


    }

    public function list_all_city()
    {
        $res = $this->relation_model->get_district_by_level(Relation3_model::CITY);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_directcity()
    {
        $res = $this->relation_model->get_district_by_level(Relation3_model::DIRECT_CITY);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }
    public function list_all_directtown()
    {
        $res = $this->relation_model->get_district_by_level(Relation3_model::CITY_REGION);
        foreach($res as $item)
        {
            echo $item['id'],"\n";
        }
    }

    public function list_all_countytown()
    {
        $res = $this->relation_model->get_district_by_level(Relation3_model::COUNTYTOWN);
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
        $province_info = $this->relation_model->get_district(array("id"=>$province_id));
        $url = "http://post.8684.cn/s".$province_info['pingyin'].".htm";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<a href="/c(\d*).htm">([^<]*)</a> <span>(\d*)</span> <span>(\d*)</span> </div>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $id = $this->relation_model->insert_district($matches[2][$i],$province_info['fullname'].$matches[2][$i],$matches[1][$i],Relation3_model::CITY,$province_id,0,$province_id);
                if($id)
                {
                    $this->district_model->insert_district(array("id"=>$id,
                        "name"=>$matches[2][$i],
                        "fullname"=>$province_info['fullname'].$matches[2][$i],
                        "zip_code"=>$matches[4][$i],
                        "long_distance_area_code"=>$matches[3][$i],
                        "admin_level"=>Relation3_model::CITY,
                    ));

                }
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
                $this->relation_model->insert_district($matches[2][$i],$province_info['fullname'].$matches[2][$i],$matches[1][$i],Relation3_model::CITY_REGION,$province_id,0,$province_id);
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
        $url = "http://post.8684.cn/c".$city_info['pingyin'].".htm";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(preg_match_all('~<a class="list-con-td3" href="/a(\d*)_1.htm">([^<]*)</a> <span class="list-con-td4">(\d*)</span> <span class="list-con-td5">(\d*)</span>~',$content,$matches))
        {
            for($i=0;$i<count($matches[0]);$i++)
            {
                $id = $this->relation_model->insert_district($matches[2][$i],$city_info['fullname'].$matches[2][$i],$matches[1][$i],Relation3_model::COUNTYTOWN,$city_id,$city_info['pid'],$city_info['rid']);
                if($id)
                {
                    $this->district_model->insert_district(array("id"=>$id,
                        "name"=>$matches[2][$i],
                        "fullname"=>$city_info['fullname'].$matches[2][$i],
                        "zip_code"=>$matches[4][$i],
                        "long_distance_area_code"=>$matches[3][$i],
                        "admin_level"=>Relation3_model::COUNTYTOWN,
                    ));

                }

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
        $url = "http://post.8684.cn/a".$info['pingyin']."_1.htm";
        echo $url,"\n";
        $content = file_get_contents($url);
        if(empty($content))
        {
            echo "needtry whole:$townid \n";
            return;
        }
        $lastpage=1;
        if(preg_match('~<a href="http://post.8684.cn/a'.$info['pingyin'].'_(\d*).htm">末页</a>~',$content,$matches))
        {
            $lastpage = $matches[1];
        }
        for($page=1;$page<=$lastpage;$page++)
        {
            $url = "http://post.8684.cn/a".$info['pingyin']."_".$page.".htm";
            $content  = file_get_contents($url);
            if(preg_match_all('~<a href="/p(\d*)_'.$info['pingyin'].'.htm">([^<]*)</a> <span>(\d*)</span> <span>(\d*)</span>~',$content,$matches)) {
                for($i=0;$i<count($matches[0]);$i++)
                {
                    $id = $this->relation_model->insert_district($matches[2][$i],$info['fullname'].$matches[2][$i],$matches[1][$i],Relation3_model::TOWN,$townid,$info['pid'],$info['rid']);
                    if($id)
                    {
                        $this->district_model->insert_district(array("id"=>$id,
                            "name"=>$matches[2][$i],
                            "fullname"=>$info['fullname'].$matches[2][$i],
                            "zip_code"=>$matches[4][$i],
                            "long_distance_area_code"=>$matches[3][$i],
                            "admin_level"=>Relation3_model::TOWN,
                        ));

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
