<?php
require('./model/Student.php');
require('./model/Base.php');
class frontController  {

      /***
       *    Add students after fetching data
       *    No args
       ***/
      public function addStudents() {                         
             try {
                  $data = $this->getInputs();
                  $base = Base::Instance();
                  if(count($data) > 0) {
                     foreach ($data as $item) {
                           $items = explode(",", $item);
                           $student = new Student();                           
                           $student->id = trim($items[0]);
                           $student->name = trim($items[1]);
                           $student->gpa = (string) (float) trim($items[2]);                                                      
                           $base->addRecord($student);
                     }                     
                  }   
                  
             }
             catch (Exception $e) {
                   echo 'Cant add: ',  $e->getMessage(), "\n"; 
             }
      }
      
      /***
       *    Calculates percentiles of all students in store
       *    No args
       ***/
       
      public function calculatePerentile() {
             try {
                  $base = Base::Instance();
                  $data = $base->getAll();
                  $total = $base->getTotalRecords();
                  $iter = 0;                  
                  foreach($data as $key=>$student) {
                         $cnt = count($student);
                         $lessOrEqual = ($cnt - 1) + $iter; 
                         $percentile = ($lessOrEqual / $total) * 100;
                         $iter = $iter + $cnt;
                         $base->setPercentile($key, $percentile);
                  }                      
             }
             catch (Exception $e) {
                   echo 'Error in calculation: ',  $e->getMessage(), "\n"; 
             }         
      }

      /***
       *    Dipplays records to end users
       *    No args
       ***/
             
      public function displayRecords()  {
             print "<table width='50%'>";
             print "<th>Name</th></th><th>GPA</th><th>Percentile</th>";
             $base = Base::Instance();
             $data = $base->getAll();
             foreach($data as $items) {
                     foreach($items as $item) {
                            print "<tr>";
                            print "<td width='20%' align='center'>".$item->name."</td><td width='10%' align='center'>".$item->gpa."</td><td align='center' width='10%'>".$item->percentile."</td>";
                            print "</tr>";
                     }
             }
             print "</table>";
      } 
                                                                       
      /***
       *    Get records either from API / users
       *    Hard coded as No DB exists
       *    No args
       ***/
       
      private function getInputs() {
             return array(1=>'471908US,"Randy Perez",1.60',
                           2=>'957625US,"Alice Brown",3.50',
                           3=>'909401US,"Maria Russell",3.90',
                           4=>'342575US,"Shirley Evans,3.5',
                           5=>'780367US,"Daniel Bell",2.20',
                           6=>'841786US,"Willie Richardson",3.60',
                           7=>'881365US,"Ruby Lee",2.70',
                           8=>'848124US,"Peter Powell",2.30',
                           9=>'497579US,"Bruce Nelson",3.70',
                           10=>'756454US,"Bonnie Murphy",3.50',
                           11=>'551871US,"Chris ""Mac"" Cooper",2.70',
                           12=>'734476US,"Christine Walker",2.70',
                           13=>'138197US,"Alan Robinson",1.80',
                           14=>'755435US,"Philip Allen",2.90',
                           15=>'744270US,"Justin Scott",3.80',
                           16=>'140419US,"James Edwards",2.40',
                           17=>'263737US,"Ann Mitchell",3.60',
                           18=>'522471US,"Eugene Rivera",3.50',
                           19=>'022169US,"Irene Simmons",2.20',
                           20=>'690697US,"Joshua Uber",3.60',
                           21=>'094778US,"Jonathan Reed",3.50',
                           22=>'73780US,"Johnny Ross",2.20',
                           23=>'256090US,"Jessica Howard",3.60',
                           24=>'775011US,"Frank Kelly",2.20',
                           25=>'333218US,"Kathy Patterson",3.7');
                           
      }
}
?>