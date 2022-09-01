<?php
class Report_model extends CI_Model
{
    //Tailor Complete
    public function getTailorCompleteData($param)
    {
        // print_r($param);

        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }

        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }

        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }


        $sql="SELECT Store_Name, Order_No, Order_Date, Sub_Garment, Primary_Service, Due_on, date_format(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30'),  '%d-%m-%Y %H:%i:%s') as stitch_start_time, tbl_tailor.Barcode, station_id FROM `tbl_tailor` inner join tbl_challan_data on (tbl_tailor.Barcode=tbl_challan_data.Barcode) WHERE 1 $search_query order by stitch_start_time desc" ;
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function get_all_tailor_stations()
    {
        return $this->db->query("select station_id from tbl_tailor group by station_id order by station_id")
         ->result_array();
    }


    public function getTailorTotalData($param)
    {
        // print_r($param);
        $sql_query='';
        $sql="select * from tbl_tailor group by station_id";
        $query = $this->db->query($sql)->result_array();

        foreach ($query as $r) {
            $sql_query.="count(if(station_id=".$r['station_id'].", 1 , null)) as '".$r['station_id']."', ";
        }



        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }

        if (!empty($param['station_id'])) {
            $search_query.=" and station_id='".$param['station_id']."'";
        }

        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }


        $sql="SELECT $sql_query count(tbl_tailor.Barcode) as total, date(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30')) as date FROM `tbl_tailor` WHERE 1  $search_query GROUP by day(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30')) order by date(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30')) desc";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function getToilorTotalHourly($param)
    {
        // print_r($param);

        $sql_query='';
        $sql="select * from tbl_tailor group by station_id";
        $query = $this->db->query($sql)->result_array();

        foreach ($query as $r) {
            $sql_query.="count(if(station_id=".$r['station_id'].", 1 , null)) as '".$r['station_id']."', ";
        }


        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30') ) = '".$param['from_date']."'";
        } else {
            $search_query='';
        }

        if (!empty($param['station_id'])) {
            $search_query.=" and station_id='".$param['station_id']."'";
        }

        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }




        $sql="SELECT $sql_query date_format(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(tbl_tailor.Barcode) as total FROM `tbl_tailor`
         WHERE 1  $search_query GROUP by  hour(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(stitch_start_time, @@session.time_zone, '+05:30')) ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



     /****************************LOT Garment Report******************************************/


     public function getLotCompleteData($param)
     {
         // print_r($param);

         if (!empty($param['from_date']) && !empty($param['to_date'])) {
             $search_query=" and date(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
         } else {
             $search_query='';
         }

         if (!empty($param['store_id'])) {
             $search_query.=" and store_id='".$param['store_id']."'";
         }

         if (!empty($param['Primary_Service'])) {
             $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
         }


         $sql="SELECT Store_Name, Order_No, Order_Date, Sub_Garment, Primary_Service, Due_on, date_format(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30'),  '%d-%m-%Y %H:%i:%s') as lot_time, tbl_garment_lot.Barcode, station_id FROM `tbl_garment_lot` inner join tbl_challan_data on (tbl_garment_lot.Barcode=tbl_challan_data.Barcode) WHERE 1 $search_query order by lot_time desc" ;
         $query = $this->db->query($sql)->result_array();
         return $query;
     }


     public function get_all_lot_stations()
     {
         return $this->db->query("select station_id from tbl_garment_lot group by station_id order by station_id")
          ->result_array();
     }


     public function getLotTotalData($param)
     {
         // print_r($param);
         $sql_query='';
         $sql="select * from tbl_garment_lot group by station_id";
         $query = $this->db->query($sql)->result_array();

         foreach ($query as $r) {
             $sql_query.="count(if(station_id=".$r['station_id'].", 1 , null)) as '".$r['station_id']."', ";
         }



         if (!empty($param['from_date']) && !empty($param['to_date'])) {
             $search_query=" and date(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
         } else {
             $search_query='';
         }

         if (!empty($param['station_id'])) {
             $search_query.=" and station_id='".$param['station_id']."'";
         }

         if (!empty($param['Primary_Service'])) {
             $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
         }


         $sql="SELECT $sql_query count(tbl_garment_lot.Barcode) as total, date(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30')) as date FROM `tbl_garment_lot` WHERE 1  $search_query GROUP by day(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30')) order by date(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30')) desc";
         $query = $this->db->query($sql)->result_array();
         return $query;
     }



     public function getLotTotalHourly($param)
     {
         // print_r($param);

         $sql_query='';
         $sql="select * from tbl_garment_lot group by station_id";
         $query = $this->db->query($sql)->result_array();

         foreach ($query as $r) {
             $sql_query.="count(if(station_id=".$r['station_id']." , 1 , null)) as '".$r['station_id']."', ";
         }


         if (!empty($param['from_date']) && !empty($param['to_date'])) {
             $search_query=" and date(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30') ) = '".$param['from_date']."'";
         } else {
             $search_query='';
         }

         if (!empty($param['station_id'])) {
             $search_query.=" and station_id='".$param['station_id']."'";
         }

         if (!empty($param['Primary_Service'])) {
             $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
         }

         $sql="SELECT $sql_query date_format(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(tbl_garment_lot.Barcode) as total FROM `tbl_garment_lot` WHERE 1  $search_query GROUP by  hour(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(lot_time, @@session.time_zone, '+05:30')) ";
         $query = $this->db->query($sql)->result_array();
         return $query;
     }


          /****************************Washing Garment Report******************************************/


          public function getWashingCompleteData($param)
          {
              // print_r($param);

              if (!empty($param['from_date']) && !empty($param['to_date'])) {
                  $search_query=" and date(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
              } else {
                  $search_query='';
              }

              if (!empty($param['store_id'])) {
                  $search_query.=" and store_id='".$param['store_id']."'";
              }

              if (!empty($param['Primary_Service'])) {
                  $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
              }


              $sql="SELECT Store_Name, Order_No, Order_Date, Sub_Garment, Primary_Service, Due_on, date_format(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30'),  '%d-%m-%Y %H:%i:%s') as wash_start_time, tbl_washing.Barcode, station_id FROM `tbl_washing` inner join tbl_challan_data on (tbl_washing.Barcode=tbl_challan_data.Barcode) WHERE 1 $search_query order by wash_start_time desc" ;
              $query = $this->db->query($sql)->result_array();
              return $query;
          }


          public function get_all_washing_stations()
          {
              return $this->db->query("select station_id from tbl_washing group by station_id order by station_id")
               ->result_array();
          }


          public function getWashingTotalData($param)
          {
              // print_r($param);
              $sql_query='';
              $sql="select * from tbl_washing group by station_id";
              $query = $this->db->query($sql)->result_array();

              foreach ($query as $r) {
                  $sql_query.="count(if(station_id=".$r['station_id'].", 1 , null)) as '".$r['station_id']."', ";
              }



              if (!empty($param['from_date']) && !empty($param['to_date'])) {
                  $search_query=" and date(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
              } else {
                  $search_query='';
              }

              if (!empty($param['station_id'])) {
                  $search_query.=" and station_id='".$param['station_id']."'";
              }

              if (!empty($param['Primary_Service'])) {
                  $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
              }


              $sql="SELECT $sql_query count(tbl_washing.Barcode) as total, date(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30')) as date FROM `tbl_washing` WHERE 1  $search_query GROUP by day(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30')) order by date(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30')) desc";
              $query = $this->db->query($sql)->result_array();
              return $query;
          }



          public function getWashingTotalHourly($param)
          {
              // print_r($param);

              $sql_query='';
              $sql="select * from tbl_washing group by station_id";
              $query = $this->db->query($sql)->result_array();

              foreach ($query as $r) {
                  $sql_query.="count(if(station_id=".$r['station_id']." , 1 , null)) as '".$r['station_id']."', ";
              }


              if (!empty($param['from_date']) && !empty($param['to_date'])) {
                  $search_query=" and date(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30') ) = '".$param['from_date']."'";
              } else {
                  $search_query='';
              }

              if (!empty($param['station_id'])) {
                  $search_query.=" and station_id='".$param['station_id']."'";
              }

              if (!empty($param['Primary_Service'])) {
                  $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
              }

              $sql="SELECT $sql_query date_format(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(tbl_washing.Barcode) as total FROM `tbl_washing` WHERE 1  $search_query GROUP by  hour(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(wash_start_time, @@session.time_zone, '+05:30')) ";
              $query = $this->db->query($sql)->result_array();
              return $query;
          }
}