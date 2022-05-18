<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Lab 2 by Raymond Yan</p>
    <?php

        function getDayOfTheWeek($year,$month,$day){
            $nums = [];

            $day_of_the_week = array(
                "0"=>"Saturday",
                "1"=>"Sunday",
                "2"=>"Monday",
                "3"=>"Tuesday",
                "4"=>"Wednesday",
                "5"=>"Thursday",
                "6"=>"Friday"
            );
            $month_number = array("1"=>"1","2"=>"4","3"=>"4",
                            "4"=>"0","5"=>"2","6"=>"2",
                            "7"=>"0","8"=>"3","9"=>"6",
                            "10"=>"1","11"=>"4","12"=>"6");

            $lastTwoDigits = $year%100;
            $nums[] = (floor($lastTwoDigits/12)); //step 1 

            $nums[] = ($lastTwoDigits-(($nums[0]*12))); //step2  
            
            $nums[] = floor($nums[1]/4); //step 3 
            $nums[] = $day;
            //step 5
            $nums[] = ($month_number[$month]);

            //special offsets
            if(isLeapYear($year) and ($month==1 or $month==2))
            {
                $nums[4] = $nums[4] - 1;
            }
            if($year>=1600 and $year<1700)
            {
                $nums[4] = $nums[4] + 6;
            }
            if($year>=1700 and $year<1800)
            {
                $nums[4] = $nums[4] + 4;
            }
            if($year>=1800 and $year<1900)
            {
                $nums[4] = $nums[4] + 2;
            }
            if($year>=2000 and $year<2100)
            {
                $nums[4] = $nums[4] + 6;
            }
            if($year>=2100 and $year<2200)
            {
                $nums[4] = $nums[4] + 4;
            }
            
            //step 6
            $numeric_day = ($nums[0]+$nums[1]+$nums[2]+$nums[3]+$nums[4])%7;
            return $day_of_the_week[$numeric_day];
        }
        function isLeapYear($year){
            if($year%4==0 and $year%100==0 and $year%400==0)
            {
                return true;
            }
            if($year%4==0 and $year%100!=0){
                return true;
            }
            return false;
        }

        function makeCalendar(){
            $months = date('n');
            $year = date('Y');
            for($x=1; $x<=$months; $x++)
            {
                $days = date('j');
                for($y=1;$y<=$days;$y++)
                {
                    echo $x . "-" . $y . "-" . $year . " is a " . getDayOfTheWeek($year,$x,$y) . ".<br>";
                }
            }
        }
        echo "August 16, 1989 " . getDayOfTheWeek(1989,8,16) . "<br>";
        echo "March 20, 1950 " . getDayOfTheWeek(1950,3,20) . "<br> <br> <br>";


        makeCalendar();
    ?>

</body>
</html>