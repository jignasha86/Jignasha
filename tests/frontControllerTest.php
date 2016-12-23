<?php
use PHPUnit\Framework\TestCase;
require("./controller/frontController.php");
require('./model/Base.php');

class frontControllerTest extends TestCase {
      $expectedOutput = array(1=>"Randy Perez,1.6,0",
                             2=>"Alan Robinson,1.8,4",
                             3=>"Daniel Bell,2.2,20",
                             4=>"Irene Simmons,2.2,20",
                             5=>"Johnny Ross,2.2,20",
                             6=>"Frank Kelly,2.2,20",
                             7=>"Peter Powell,2.3,24",
                             8=>"James Edwards,2.4,28",
                             9=>"Ruby Lee,2.7,40",
                             10=>"Chris ""Mac"" Cooper,2.7,40",
                             11=>"Christine Walker,2.7,40",
                             12=>"Philip Allen,2.9,44",
                             13=>"Alice Brown,3.5,64",
                             14=>"Shirley Evans,3.5,64",
                             15=>"Bonnie Murphy,3.5,64",
                             16=>"Eugene Rivera,3.5,64",
                             17=>"Jonathan Reed,3.5,64",
                             18=>"Willie Richardson,3.6,80",
                             19=>"Ann Mitchell,3.6,80",
                             20=>"Joshua Uber,3.6,80",
                             21=>"Jessica Howard,3.6,80",
                             22=>"Bruce Nelson,3.7,88",
                             23=>"Kathy Patterson,3.7,88",
                             24=>"Justin Scott,3.8,92",
                             25=>"Maria Russell,3.9,96");
                           
      $cntr = new frontController();
      $inputArray = $cntr->getInputs();
      $cntr->addStudents();
      $cntr->calculatePerentile();
      $base = Base::Instance();
      $data = $base->getAll();
      $total = $base->getTotalRecords()
      $out = array();
      $rec = 1
      foreach($data as $items) {
            foreach($items as $item) {
                   $str = $item->name.",".$item->gpa.",".$item->percentile;
                   $out[$rec] = $str;
                   $rec += 1;
            }
      }
      
      $diff = array_diff($out, $expectedOutput);
      assertEquals(count($out),count($expectedOutput));
      assertEquals(count($diff), 0);
      assertEquals(count($out), $total);
      assertEquals(count($inputArray), count(out));
}
?>