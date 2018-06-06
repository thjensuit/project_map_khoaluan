<?php
      $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=tranthaison");
      if ($name[0]!="") {
    	$select_data = "SELECT * FROM $name[0]";
    	$result_selectdata = pg_query($conn,"$select_data");
    	if($result_selectdata == true){
    		while ($row = pg_fetch_array($result_selectdata)) {
    			$q1 = 100;
    			$q2 = 75;
    			$q3 = 50;
    			$q4 = 25;
    			$q5 = 1;

        //A*****--------WQI_SI_BOD**----------
    			$wqi_si_bod = 1;
    			$bqi_bod = 1;
    			$qi_bod = 1;
    			$bqi1_bod = 1;
    			$qi1_bod = 1;

    			if($row['bod'] <= 4){
    				$wqi_si_bod = 100;
    			}elseif($row['bod'] ==6){
    				$wqi_si_bod = 75;
    			}elseif ($row['bod'] == 15) {
    				$wqi_si_bod = 50;
    			}elseif ($row['bod'] == 25) {
    				$wqi_si_bod = 25;
    			}elseif ($row['bod'] >= 50) {
    				$wqi_si_bod = 1;
    			}elseif ($row['bod'] > 4 && $row['bod'] < 6 )
    			{
    				$bqi_bod = 4;
    				$qi_bod = $q1;
    				$bqi1_bod = 6;
    				$qi1_bod = $q2;
    				$wqi_si_bod = ((($qi_bod-$qi1_bod)/($bqi1_bod-$bqi_bod))*($bqi1_bod-$row['bod'])) + $qi1_bod;
    			}elseif($row['bod'] > 6 && $row['bod'] < 15 ) {

    				$bqi_bod = 6;
    				$qi_bod = $q2;
    				$bqi1_bod = 15;
    				$qi1_bod = $q3;
    				$wqi_si_bod = ((($qi_bod-$qi1_bod)/($bqi1_bod-$bqi_bod))*($bqi1_bod-$row['bod'])) + $qi1_bod;
    			}elseif($row['bod'] > 15 && $row['bod'] < 25 ){
    				$bqi_bod = 15;
    				$qi_bod = $q3;
    				$bqi1_bod = 25;
    				$qi1_bod = $q4;
    				$wqi_si_bod = ((($qi_bod-$qi1_bod)/($bqi1_bod-$bqi_bod))*($bqi1_bod-$row['bod'])) + $qi1_bod;
    			}else{
    				$bqi_bod = 25;
    				$qi_bod = $q4;
    				$bqi1_bod = 50;
    				$qi1_bod = $q5;
    				$wqi_si_bod = ((($qi_bod-$qi1_bod)/($bqi1_bod-$bqi_bod))*($bqi1_bod-$row['bod'])) + $qi1_bod;
    			}

    			$wqi_si_bod = round($wqi_si_bod , 2, PHP_ROUND_HALF_UP);
    			$update_wqibod = "UPDATE $name[0] SET wqi_bod = $wqi_si_bod where id = $row[0]";
    			//pg_query($conn,"$update_wqibod");
                $arr_wqibod[] = $wqi_si_bod;


                 #    A -------WQI_COD---------

                $wqi_si_cod = 1;
                $bqi_cod = 1;
                $qi_cod = 1;
                $bqi1_cod = 1;
                $qi1_cod = 1;
                $w1 = 0;

                if($row['cod'] <= 10){
                  $wqi_si_cod = 100;
              }elseif($row['cod'] ==15){
                  $wqi_si_cod = 75;
              }elseif ($row['cod'] == 30) {
                  $wqi_si_cod = 50;
              }elseif ($row['cod'] == 50) {
                  $wqi_si_cod = 25;
              }elseif ($row['cod'] >= 80) {
                  $wqi_si_cod = 1;
              }
              elseif ($row['cod'] > 10 && $row['cod'] < 15 )
              {
                  $bqi_cod = 10;
                  $qi_cod = $q1;
                  $bqi1_cod = 15;
                  $qi1_cod = $q2;
                  $wqi_si_cod = ((($qi_cod-$qi1_cod)/($bqi1_cod-$bqi_cod))*($bqi1_cod-$row['cod'])) + $qi1_cod;
              } elseif($row['cod'] > 15 && $row['cod'] < 30 ) {

                  $bqi_cod = 15;
                  $qi_cod = $q2;
                  $bqi1_cod = 30;
                  $qi1_cod = $q3;
                  $wqi_si_cod = ((($qi_cod-$qi1_cod)/($bqi1_cod-$bqi_cod))*($bqi1_cod-$row['cod'])) + $qi1_cod;
              } elseif($row['cod'] > 30 && $row['cod'] < 55 ){
                  $bqi_cod = 15;
                  $qi_cod = $q3;
                  $bqi1_cod = 25;
                  $qi1_cod = $q4;
                  $wqi_si_cod = ((($qi_cod-$qi1_cod)/($bqi1_cod-$bqi_cod))*($bqi1_cod-$row['cod'])) + $qi1_cod;
              } else{
                  $bqi_cod = 55;
                  $qi_cod = $q4;
                  $bqi1_cod = 80;
                  $qi1_cod = $q5;
                  $wqi_si_cod = ((($qi_cod-$qi1_cod)/($bqi1_cod-$bqi_cod))*($bqi1_cod-$row['cod'])) + $qi1_cod;
              }
              $wqi_si_cod = round($wqi_si_cod , 2, PHP_ROUND_HALF_UP);
         // $update_wqicod = "UPDATE $name[0] SET wqi_cod = $wqi_si_cod where id = $row[0]";
          //$conn->query($update_wqicod);
              $arr_wqicod[]= $wqi_si_cod;
              $id[]= $row[0];

            #A------ NH4 -----------
              $wqi_si_nh4 = 1;
              $bqi_nh4 = 1;
              $qi_nh4 = 1;
              $bqi1_nh4 = 1;
              $qi1_nh4 = 1;

              if($row['n'] <= 0.1){
                  $wqi_si_nh4 = 100;
              }elseif($row['n'] ==0.2){
                  $wqi_si_nh4 = 75;
              }elseif ($row['n'] == 0.5) {
                  $wqi_si_nh4 = 50;
              }elseif ($row['n'] == 1) {
                  $wqi_si_nh4 = 25;
              }elseif ($row['n'] >= 5) {
                  $wqi_si_nh4 = 1;
              }
              elseif ($row['n'] > 0.1 && $row['n'] < 0.2 )
              {
                  $bqi_nh4 = 0.1;
                  $qi_nh4 = $q1;
                  $bqi1_nh4 = 0.2;
                  $qi1_nh4 = $q2;
                  $wqi_si_nh4 = ((($qi_nh4-$qi1_nh4)/($bqi1_nh4-$bqi_nh4))*($bqi1_nh4-$row['n'])) + $qi1_nh4;
              } elseif($row['n'] > 0.2 && $row['n'] < 0.5 ) {

                  $bqi_nh4 = 0.2;
                  $qi_nh4 = $q2;
                  $bqi1_nh4 = 0.5;
                  $qi1_nh4 = $q3;
                  $wqi_si_nh4 = ((($qi_nh4-$qi1_nh4)/($bqi1_nh4-$bqi_nh4))*($bqi1_nh4-$row['n'])) + $qi1_nh4;
              } elseif($row['n'] > 0.5 && $row['n'] < 1 ){
                  $bqi_nh4 = 0.5;
                  $qi_nh4 = $q3;
                  $bqi1_nh4 = 1;
                  $qi1_nh4 = $q4;
                  $wqi_si_nh4 = ((($qi_nh4-$qi1_nh4)/($bqi1_nh4-$bqi_nh4))*($bqi1_nh4-$row['n'])) + $qi1_nh4;
              } else{
                  $bqi_nh4 = 1;
                  $qi_nh4 = $q4;
                  $bqi1_nh4 = 5;
                  $qi1_nh4 = $q5;
                  $wqi_si_nh4 = ((($qi_nh4-$qi1_nh4)/($bqi1_nh4-$bqi_nh4))*($bqi1_nh4-$row['n'])) + $qi1_nh4;
              }
              $wqi_si_nh4= round($wqi_si_nh4 , 2, PHP_ROUND_HALF_UP);
              $arr_wqinh4[]= $wqi_si_nh4;

               #A-------- P-PO4+ -----------

        $wqi_si_p = 1;
        $bqi_p = 1;
        $qi_p = 1;
        $bqi1_p = 1;
        $qi1_p = 1;

        if($row['p'] <= 0.1){
          $wqi_si_p = 100;
        }elseif($row['p'] ==0.2){
          $wqi_si_p = 75;
        }elseif ($row['p'] == 0.3) {
          $wqi_si_p = 50;
        }elseif ($row['p'] == 0.5) {
          $wqi_si_p = 25;
        }elseif ($row['p'] >= 6) {
          $wqi_si_p = 1;
        }
        elseif ($row['p'] > 0.1 && $row['p'] < 0.2 )
        {
          $bqi_p = 0.1;
          $qi_p = $q1;
          $bqi1_p = 0.2;
          $qi1_p = $q2;
          $wqi_si_p = ((($qi_p-$qi1_p)/($bqi1_p-$bqi_p))*($bqi1_p-$row['p'])) + $qi1_p;
        } elseif($row['p'] > 0.2 && $row['p'] < 0.3 ) {

          $bqi_p = 0.2;
          $qi_p = $q2;
          $bqi1_p = 0.3;
          $qi1_p = $q3;
          $wqi_si_p = ((($qi_p-$qi1_p)/($bqi1_p-$bqi_p))*($bqi1_p-$row['p'])) + $qi1_p;
        } elseif($row['p'] > 0.3 && $row['p'] < 0.5 ){
          $bqi_p = 0.3;
          $qi_p = $q3;
          $bqi1_p = 0.5;
          $qi1_p = $q4;
          $wqi_si_p = ((($qi_p-$qi1_p)/($bqi1_p-$bqi_p))*($bqi1_p-$row['p'])) + $qi1_p;
        } else{
          $bqi_p = 0.5;
          $qi_p = $q4;
          $bqi1_p = 6;
          $qi1_p = $q5;
          $wqi_si_p = ((($qi_p-$qi1_p)/($bqi1_p-$bqi_p))*($bqi1_p-$row['p'])) + $qi1_p;
        }
          $wqi_si_p= round($wqi_si_p , 2, PHP_ROUND_HALF_UP);
          $arr_wqip[]= $wqi_si_p;


          #A-- ----- Coliform -------
        $wqi_si_Col = 1;
        $bqi_Col = 1;
        $qi_Col = 1;
        $bqi1_Col = 1;
        $qi1_Col = 1;

        if($row['coliform'] <= 2500){
          $wqi_si_Col = 100;
        }elseif($row['coliform'] ==5000){
          $wqi_si_Col = 75;
        }elseif ($row['coliform'] == 7500) {
          $wqi_si_Col = 50;
        }elseif ($row['coliform'] == 10000) {
          $wqi_si_Col = 25;
        }elseif ($row['coliform'] > 10000) {
          $wqi_si_Col = 1;
        }
        elseif ($row['coliform'] > 2500 && $row['coliform'] < 5000 )
        {
          $bqi_Col = 2500;
          $qi_Col = $q1;
          $bqi1_Col = 5000;
          $qi1_Col = $q2;
          $wqi_si_Col = ((($qi_Col-$qi1_Col)/($bqi1_Col-$bqi_Col))*($bqi1_Col-$row['coliform'])) + $qi1_Col;
        } elseif($row['coliform'] > 5000 && $row['coliform'] < 7500 ) {

          $bqi_Col = 5000;
          $qi_Col = $q2;
          $bqi1_Col = 7500;
          $qi1_Col = $q3;
          $wqi_si_Col = ((($qi_Col-$qi1_Col)/($bqi1_Col-$bqi_Col))*($bqi1_Col-$row['coliform'])) + $qi1_Col;
        } else{
          $bqi_Col = 7500;
          $qi_Col = $q3;
          $bqi1_Col = 10000;
          $qi1_Col = $q4;
          $wqi_si_Col = ((($qi_Col-$qi1_Col)/($bqi1_Col-$bqi_Col))*($bqi1_Col-$row['coliform'])) + $qi1_Col;
        }
          $wqi_si_Col= round($wqi_si_Col , 2, PHP_ROUND_HALF_UP);
          $arr_wqicol[]= $wqi_si_Col;

          #A--- DO ---- 

        $do = $row['d0'];
        $T = $row['nhietdo'] ;
        $do_baohoa = 14.652 - 0.410222*$T + 0.0079910*pow($T, 2) - 0.000077774*pow($T,3);
        $do_bhptr = ($do/$do_baohoa)*100;
        $wqi_si_do = 1;
        $bqi_do = 1;
        $qi_do = 1;
        $bqi1_do = 1;
        $qi1_do = 1;
        $wqi_si_do = 1 ;
        $a = 0 ;
        if($do_bhptr <=20){
          $wqi_si_do = 1 ;
        }elseif ($do_bhptr >= 88 && $do_bhptr <= 112 ) {
          $wqi_si_do = 100;
        }elseif ($do_bhptr >= 200) {
          $wqi_si_do = 1;
        }elseif ($do_bhptr >20 && $do_bhptr <= 50 ){
          $qi_do = 25;
          $bqi_do = 20;
          $qi1_do = 50;
          $bqi1_do = 50;
          $wqi_si_do = ((($qi_do-$qi1_do)/($bqi1_do-$bqi_do))*($do_bhptr-$bqi_do) + $qi_do);
        }elseif ($do_bhptr >50 && $do_bhptr <= 75) {
          $qi_do = 50;
          $bqi_do = 50;
          $qi1_do = 75;
          $bqi1_do = 75;
          $wqi_si_do = ((($qi1_do-$qi_do)/($bqi1_do-$bqi_do))*($do_bhptr-$bqi_do) + $qi_do);
        }elseif ($do_bhptr >75 && $do_bhptr <= 88) {
          $qi_do = 75;
          $bqi_do = 75;
          $qi1_do = 100;
          $bqi1_do = 88;
            //$a = $do_bhptr;
          $a = 10;
          $wqi_si_do = ((($qi1_do-$qi_do)/($bqi1_do-$bqi_do))*($do_bhptr-$bqi_do) + $qi_do);
        }elseif ($do_bhptr >112 && $do_bhptr <= 125) {
          $qi_do = 100;
          $bqi_do = 112;
          $qi1_do = 75;
          $bqi1_do = 125;
          $wqi_si_do = ((($qi_do-$qi1_do)/($bqi1_do-$bqi_do))*($bqi1_do- $do_bhptr) + $qi1_do);
        }elseif ($do_bhptr >125 && $do_bhptr <= 150) {
          $qi_do = 100;
          $bqi_do = 75;
          $qi1_do = 150;
          $bqi1_do = 50;
          $wqi_si_do = ((($qi_do-$qi1_do)/($bqi1_do-$bqi_do))*($bqi1_do- $do_bhptr) + $qi1_do);
        }elseif ($do_bhptr >150 && $do_bhptr <= 200) {
          $qi_do = 50;
          $bqi_do = 150;
          $qi1_do = 25;
          $bqi1_do = 200;
          $wqi_si_do = ((($qi_do-$qi1_do)/($bqi1_do-$bqi_do))*($bqi1_do+ $do_bhptr) - $qi1_do);
        }

          $wqi_si_do= round($wqi_si_do , 2, PHP_ROUND_HALF_UP);
          $arr_wqido[]= $wqi_si_do;

         #--B-- ----- TSS -------

        $wqi_si_tss = 1;
        $bqi_tss = 1;
        $qi_tss = 1;
        $bqi1_tss = 1;
        $qi1_tss = 1;

        if($row['tss'] <= 20){
          $wqi_si_tss = 100;
        }elseif($row['tss'] ==30){
          $wqi_si_tss = 75;
        }elseif ($row['tss'] == 50) {
          $wqi_si_tss = 50;
        }elseif ($row['tss'] == 100) {
          $wqi_si_tss = 25;
        }elseif ($row['tss'] > 100) {
          $wqi_si_tss = 1;
        }
        elseif ($row['tss'] > 20 && $row['tss'] < 30 )
        {
          $bqi_tss = 20;
          $qi_tss = $q1;
          $bqi1_tss = 30;
          $qi1_tss = $q2;
          $wqi_si_tss = ((($qi_tss-$qi1_tss)/($bqi1_tss-$bqi_tss))*($bqi1_tss-$row['tss'])) + $qi1_tss;
        } elseif($row['tss'] > 30 && $row['tss'] < 50 ) {

          $bqi_tss = 30;
          $qi_tss = $q2;
          $bqi1_tss = 50;
          $qi1_tss = $q3;
          $wqi_si_tss = ((($qi_tss-$qi1_tss)/($bqi1_tss-$bqi_tss))*($bqi1_tss-$row['tss'])) + $qi1_tss;
        } elseif($row['tss'] > 50 && $row['tss'] < 100 ){
          $bqi_tss = 50;
          $qi_tss = $q3;
          $bqi1_tss = 100;
          $qi1_tss = $q4;
          $wqi_si_tss = ((($qi_tss-$qi1_tss)/($bqi1_tss-$bqi_tss))*($bqi1_tss-$row['tss'])) + $qi1_tss;
        }
          $wqi_si_tss= round($wqi_si_tss , 2, PHP_ROUND_HALF_UP);
          $arr_wqitss[]= $wqi_si_tss;

          #B--- Do duc ----

        $wqi_si_doduc = 1;
        $bqi_doduc = 1;
        $qi_doduc = 1;
        $bqi1_doduc = 1;
        $qi1_doduc = 1;

        if($row['doduc'] <= 5){
          $wqi_si_doduc = 100;
        }elseif($row['doduc'] == 20){
          $wqi_si_doduc = 75;
        }elseif ($row['doduc'] == 30) {
          $wqi_si_doduc = 50;
        }elseif ($row['doduc'] == 70) {
          $wqi_si_doduc = 25;
        }elseif ($row['doduc'] >= 100) {
          $wqi_si_doduc = 1;
        }
        elseif ($row['doduc'] > 5 && $row['doduc'] < 20 )
        {
          $bqi_doduc = 5;
          $qi_doduc = $q1;
          $bqi1_doduc = 20;
          $qi1_doduc = $q2;
          $wqi_si_doduc = ((($qi_doduc-$qi1_doduc)/($bqi1_doduc-$bqi_doduc))*($bqi1_doduc-$row['doduc'])) + $qi1_doduc;
        } elseif($row['doduc'] > 20 && $row['doduc'] < 30 ) {

          $bqi_doduc = 20;
          $qi_doduc = $q2;
          $bqi1_doduc = 30;
          $qi1_doduc = $q3;
          $wqi_si_doduc = ((($qi_doduc-$qi1_doduc)/($bqi1_doduc-$bqi_doduc))*($bqi1_doduc-$row['doduc'])) + $qi1_doduc;
        } elseif($row['doduc'] > 30 && $row['doduc'] < 70 ){
          $bqi_doduc = 30;
          $qi_doduc = $q3;
          $bqi1_doduc = 70;
          $qi1_doduc = $q4;
          $wqi_si_doduc = ((($qi_doduc-$qi1_doduc)/($bqi1_doduc-$bqi_doduc))*($bqi1_doduc-$row['doduc'])) + $qi1_doduc;
        }else{
          $bqi_doduc = 70;
          $qi_doduc = $q4;
          $bqi1_doduc = 100;
          $qi1_doduc = $q5;
          $wqi_si_doduc = ((($qi_doduc-$qi1_doduc)/($bqi1_doduc-$bqi_doduc))*($bqi1_doduc-$row['doduc'])) + $qi1_doduc;
        }

          $wqi_si_doduc= round($wqi_si_doduc , 2, PHP_ROUND_HALF_UP);
         $arr_wqidoduc[]= $wqi_si_doduc;

          #------  pH  -------

        $ph = $row['ph'] ;
        $wqi_si_ph = 1;
        $qi_ph = 1;
        $bqi_ph = 1;
        $qi1_ph = 1;
        $bqi1_ph = 1 ;
        if($ph <= 5 ){
          $wqi_ph = 1 ;
        }elseif ($ph > 5.5 && $ph < 6) {
          $qi_ph = 50;
          $bqi_ph = 5.5;
          $qi1_ph = 100;
          $bqi1_ph = 6 ;
          $wqi_si_ph = ((($qi1_ph-$qi_ph)/($bqi1_ph-$bqi_ph))*($bqi1_ph-$row['ph'])) + $qi1_ph;
        }elseif ($ph >= 6 && $ph <= 8.5) {
          $wqi_si_ph = 100;

        }elseif($ph > 8.5 && $ph < 9){
          $qi_ph = 100;
          $bqi_ph = 8.5;
          $qi1_ph = 50;
          $bqi1_ph = 9 ;
          $wqi_si_ph = ((($qi_ph-$qi1_ph)/($bqi1_ph-$bqi_ph))*($bqi1_ph-$row['ph'])) + $qi1_ph;
        }else{
          $wqi_si_ph = 1;}

          $wqi_si_ph= round($wqi_si_ph , 2, PHP_ROUND_HALF_UP);
          $arr_wqiph[]= $wqi_si_ph;

          // tinh wqi_tram
          $wqi_a = $wqi_si_cod+$wqi_si_bod+$wqi_si_do+$wqi_si_nh4+$wqi_si_p;
          $wqi_b = $wqi_si_tss+ $wqi_si_doduc;
          $wqi = ($wqi_si_ph/100)*pow(($wqi_a/5)*($wqi_b/2)*$wqi_si_Col,1/3);
          $wqi= round($wqi , 0, PHP_ROUND_HALF_UP);
          $arr_wqitram[]=  $wqi;
          }




          $arrlength = count($arr_wqibod);
          for($x = 0; $x < $arrlength; $x++) {
            // echo $arr_wqibod[$x].'-';
            // echo $arr_wqicod[$x]."-";
            // echo $id[$x]."<br>";
            $update_wqi = "UPDATE $name[0] SET wqi_bod = $arr_wqibod[$x],wqi_cod=$arr_wqicod[$x],wqi_n=$arr_wqinh4[$x],wqi_p=$arr_wqip[$x],wqi_tss=$arr_wqitss[$x],wqi_do=$arr_wqido[$x],wqi_ph=$arr_wqiph[$x],wqi_coliform=$arr_wqicol[$x],wqi_doduc=$arr_wqidoduc[$x], wqi_tram = $arr_wqitram[$x] where id = $id[$x]";
            pg_query($conn,"$update_wqi");
        };
    }
}
    ?>