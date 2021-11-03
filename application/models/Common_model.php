<?php
class Common_model extends CI_Model
{

  
    /**************REPORTS***************/
  
    public function getInitialData($param)
    {
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and Order_Date between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        $sql="SELECT *, count(Order_No) as total_clothes, SUM(Case when initial_stage=0 then 1 else 0 end) as incomplete_cloth, GROUP_CONCAT(Garment) as grament, GROUP_CONCAT(Case when initial_stage=0 then Garment else '' end) as incomplete_garment FROM `tbl_challan_data` WHERE 1 $search_query group by store_id, Order_No";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getInitialCompleteData($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT * FROM `tbl_challan_data` WHERE 1 and initial_stage=1 $search_query order by Due_on, Store_Name";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getInitialTotalData($param)
    {
        // print_r($param);
       
        $sql_query='';
        $sql="select * from tbl_challan_data group by incoming_station_id";
        $query = $this->db->query($sql)->result_array();
        
        foreach ($query as $r) {
            $sql_query.="count(if(incoming_station_id=".$r['incoming_station_id'].", 1 , null)) as '".$r['incoming_station_id']."', ";
        }
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT $sql_query COUNT(Barcode) as total, date(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')) as date FROM `tbl_challan_data` WHERE 1 and initial_stage =1 $search_query GROUP by initial_stage, day(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')) order by date(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')) desc";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function getInitialTotalDataMonth($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and YEAR(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')) = YEAR('".$param['from_date']."') and MONTH(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')) = MONTH('".$param['from_date']."')";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(Barcode) as totalmtd FROM `tbl_challan_data` WHERE 1 and initial_stage =1 $search_query ";
        $query = $this->db->query($sql)->first_row();
        return $query;
    }




    public function getInitialDataHourly($param)
    {
        // print_r($param);
       
        $sql_query='';
        $sql="select * from tbl_challan_data group by incoming_station_id";
        $query = $this->db->query($sql)->result_array();
        
        foreach ($query as $r) {
            $sql_query.="count(if(incoming_station_id=".$r['incoming_station_id'].", 1 , null)) as '".$r['incoming_station_id']."', ";
        }
       
        
        
        if (!empty($param['from_date'])) {
            $search_query=" and date(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')) = '".$param['from_date']."'";
        } else {
            $search_query='';
        }
        
        /*
                if(!empty($param['store_id']))
                $search_query.=" and store_id='".$param['store_id']."'";
        */
        
        
        $sql="SELECT $sql_query date_format(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(Barcode) as total  FROM `tbl_challan_data` WHERE 1 and initial_stage =1 $search_query  GROUP by initial_stage, hour(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(initial_time, @@session.time_zone, '+05:30'))";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getSpotCompleteData($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        //$sql="SELECT * FROM `tbl_challan_data` right join (select group_concat(station_id) as st, Barcode, group_concat(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) as spt from tbl_spot where 1 $search_query group by Barcode order by spot_time asc) as temp on (temp.Barcode=tbl_challan_data.Barcode) WHERE 1  order by Due_on, Store_Name";
         
        $sql="SELECT Store_Name, Order_No, Order_Date, Sub_Garment, Primary_Service, Due_on, date_format(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30'),  '%d-%m-%Y %H:%i:%s') as spot_time, tbl_spot.Barcode, station_id FROM `tbl_spot` inner join tbl_challan_data on (tbl_spot.Barcode=tbl_challan_data.Barcode) WHERE 1 $search_query order by spot_time desc" ;
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getSpotStationId()
    {
        $sql="select * from tbl_spot group by station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getPackingStations()
    {
        $sql="select * from tbl_challan_data group by packing_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getQCStations()
    {
        $sql="select * from tbl_challan_data group by qc_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function getAllUserName()
    {
        $sql="select * from tbl_users";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function getInitialStations()
    {
        $sql="select * from tbl_challan_data group by incoming_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }





    public function getSpotTotalData($param)
    {
        // print_r($param);
        $sql_query='';
        $sql="select * from tbl_spot group by station_id";
        $query = $this->db->query($sql)->result_array();
        
        foreach ($query as $r) {
            $sql_query.="count(if(station_id=".$r['station_id'].", 1 , null)) as '".$r['station_id']."', ";
        }
        
        
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and station_id='".$param['store_id']."'";
        }
        
        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }
        
        
        $sql="SELECT $sql_query count(tbl_spot.Barcode) as total, date(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) as date FROM `tbl_spot` inner join tbl_challan_data on (tbl_spot.Barcode=tbl_challan_data.Barcode) WHERE 1  $search_query GROUP by day(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) order by date(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) desc";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function getSpotTotalReport($param)
    {
        // print_r($param);
 
        
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and station_id='".$param['store_id']."'";
        }
        
        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }
        
        
        $sql="SELECT station_id,count(tbl_spot.Barcode) as total, count(case WHEN default_service = 'DC' then 1 else null end) as DC, count(case WHEN default_service = 'Laundry' then 1 else null end) as Laundry FROM `tbl_spot` inner join (select Barcode, (select defualt_service_code FROM tbl_default_service where service_code=tbl_challan_data.Primary_Service) as default_service  from tbl_challan_data) as tc on (tbl_spot.Barcode=tc.Barcode) WHERE 1 $search_query GROUP by day(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')), tbl_spot.station_id order by station_id  asc";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getSpotTotalMonthReport($param)
    {
        // print_r($param);
 
        
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and YEAR(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) = YEAR('".$param['from_date']."') and MONTH(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) = MONTH('".$param['from_date']."')";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and station_id='".$param['store_id']."'";
        }
        
        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }
        
        
        $sql="SELECT station_id,count(tbl_spot.Barcode) as total, count(case WHEN default_service = 'DC' then 1 else null end) as DC, count(case WHEN default_service = 'Laundry' then 1 else null end) as Laundry  FROM `tbl_spot` inner join (select Barcode, (select defualt_service_code FROM tbl_default_service where service_code=tbl_challan_data.Primary_Service) as default_service from tbl_challan_data) as tc on (tbl_spot.Barcode=tc.Barcode) WHERE 1 $search_query GROUP by  tbl_spot.station_id order by station_id  asc";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }




    public function getSpotTotalHourly($param)
    {
        // print_r($param);
       
        $sql_query='';
        $sql="select * from tbl_spot group by station_id";
        $query = $this->db->query($sql)->result_array();
        
        foreach ($query as $r) {
            $sql_query.="count(if(station_id=".$r['station_id'].", 1 , null)) as '".$r['station_id']."', ";
        }
        
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and station_id='".$param['store_id']."'";
        }
        
        if (!empty($param['Primary_Service'])) {
            $search_query.=" and Primary_Service='".$param['Primary_Service']."'";
        }

      
        
        
        $sql="SELECT $sql_query date_format(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(tbl_spot.Barcode) as total FROM `tbl_spot` inner join tbl_challan_data on (tbl_spot.Barcode=tbl_challan_data.Barcode) WHERE 1  $search_query GROUP by  hour(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(spot_time, @@session.time_zone, '+05:30')) ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getPackageData($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT * FROM `tbl_challan_data` WHERE 1 and packaging_stage=1 $search_query order by Due_on, Store_Name";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    
    
    
    
    public function getPackageDataTotal($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(Barcode) as total, date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') ) as date  FROM `tbl_challan_data` WHERE 1 and packaging_stage =1 $search_query GROUP by packaging_stage, day(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') )";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    

    public function getPackageDataTotalMailReport($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(tbl_challan_data.Barcode) as total, packing_station_id, date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') ) as date, count(case WHEN default_service = 'DC' then 1 else null end) as DC, count(case WHEN default_service = 'Laundry' then 1 else null end) as Laundry, count(case WHEN default_service = 'Shoe' then 1 else null end) as Shoe FROM `tbl_challan_data`inner join (select Barcode, (select defualt_service_code FROM tbl_default_service where service_code=tbl_challan_data.Primary_Service) as default_service  from tbl_challan_data) as tc on (tbl_challan_data.Barcode=tc.Barcode)  WHERE 1 and packaging_stage =1 $search_query GROUP by packaging_stage, packing_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    
    
    
    public function getPackageDataTotalMailReportMonthly($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and YEAR(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30')) = YEAR('".$param['from_date']."') and MONTH(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30')) = MONTH('".$param['from_date']."')";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(tbl_challan_data.Barcode) as total, packing_station_id, date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30') ) as date, count(case WHEN default_service = 'DC' then 1 else null end) as DC, count(case WHEN default_service = 'Laundry' then 1 else null end) as Laundry, count(case WHEN default_service = 'Shoe' then 1 else null end) as Shoe FROM `tbl_challan_data`inner join (select Barcode, (select defualt_service_code FROM tbl_default_service where service_code=tbl_challan_data.Primary_Service) as default_service  from tbl_challan_data) as tc on (tbl_challan_data.Barcode=tc.Barcode)  WHERE 1 and packaging_stage =1 $search_query GROUP by packaging_stage, packing_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    
    
    
    public function getPackageDataHourly($param)
    {
        // print_r($param);
       
        $sql_query='';
        $sql="select * from tbl_challan_data group by packing_station_id";
        $query = $this->db->query($sql)->result_array();
        
        foreach ($query as $r) {
            $sql_query.="count(if(packing_station_id=".$r['packing_station_id'].", 1 , null)) as '".$r['packing_station_id']."', ";
        }
       
        
        if (!empty($param['from_date'])) {
            $search_query=" and date(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30')) = '".$param['from_date']."'";
        } else {
            $search_query='';
        }
        
        /*
                if(!empty($param['store_id']))
                $search_query.=" and store_id='".$param['store_id']."'";
        */
        
        
        $sql="SELECT $sql_query date_format(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(Barcode) as total  FROM `tbl_challan_data` WHERE 1 and packaging_stage =1 $search_query  GROUP by packaging_stage, hour(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(packaging_time, @@session.time_zone, '+05:30'))";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    
    
    public function getQcCompleteData($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(tbl_qc.qc_time, @@session.time_zone, '+05:30') )  between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        // $sql="SELECT * FROM `tbl_challan_data` left join (select group_concat(qc_status) as qcs, Barcode, group_concat(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')) as qct from tbl_qc group by Barcode order by qc_time asc) as temp on (temp.Barcode=tbl_challan_data.Barcode) WHERE 1 and qc_stage=1 $search_query order by Due_on, Store_Name";
        
        
        $sql="SELECT Store_Name, Order_No, Order_Date, Sub_Garment, tbl_qc.qc_status, tbl_qc.qc_station_id, Primary_Service, Due_on, date_format(CONVERT_TZ(tbl_qc.qc_time, @@session.time_zone, '+05:30'),  '%d-%m-%Y %H:%i:%s') as qc_time, tbl_qc.Barcode, tbl_spot.station_id as spot_station_id, date_format(CONVERT_TZ(tbl_spot.spot_time, @@session.time_zone, '+05:30'),  '%d-%m-%Y %H:%i:%s') as spot_time FROM `tbl_qc` inner join tbl_challan_data on (tbl_qc.Barcode=tbl_challan_data.Barcode) inner join tbl_spot on (tbl_spot.Barcode=tbl_qc.Barcode) WHERE 1 and qc_stage=1  $search_query order by tbl_qc.qc_time desc";
          
          
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getQcReport($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count , date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) as date , count(DISTINCT(Barcode)) as uniquebarcode FROM `tbl_qc` WHERE 1  $search_query GROUP by day(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') )";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function getQcReportBySpotterId($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(tbl_qc.Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count , date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) as date , station_id FROM `tbl_qc` inner join tbl_spot on (tbl_spot.Barcode=tbl_qc.Barcode) WHERE 1  $search_query GROUP by day(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ), tbl_spot.station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function getQcReportMonthBySpotterId($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            //  $search_query=" and date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
            $search_query=" and YEAR(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')) = YEAR('".$param['from_date']."') and MONTH(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')) = MONTH('".$param['from_date']."')";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(tbl_qc.Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count , date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) as date , station_id FROM `tbl_qc` inner join tbl_spot on (tbl_spot.Barcode=tbl_qc.Barcode) WHERE 1  $search_query GROUP by  tbl_spot.station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getQcReportNew($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) between '".$param['from_date']."' and '".$param['to_date']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count , date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) as date , count(DISTINCT(Barcode)) as uniquebarcode, qc_station_id FROM `tbl_qc` WHERE 1  $search_query GROUP by day(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ), qc_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function getQcReportNewMonthly($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and YEAR(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')) = YEAR('".$param['from_date']."') and MONTH(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')) = MONTH('".$param['from_date']."')";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        $sql="SELECT COUNT(Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count , date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30') ) as date , count(DISTINCT(Barcode)) as uniquebarcode, qc_station_id FROM `tbl_qc` WHERE 1  $search_query GROUP by  qc_station_id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function getQcReportHourly($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date'])) {
            $search_query=" and date(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')) = '".$param['from_date']."'";
        } else {
            $search_query='';
        }
        
        /*
                if(!empty($param['store_id']))
                $search_query.=" and store_id='".$param['store_id']."'";
        */
        
        
        $sql="SELECT date_format(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30'),  '%H') as hr_no, COUNT(Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count  FROM `tbl_qc` WHERE 1 $search_query  GROUP by hour(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30')), day(CONVERT_TZ(qc_time, @@session.time_zone, '+05:30'))";
        $query = $this->db->query($sql)->result_array();
        return $query;
        //return;
    }






    //SELECT COUNT(Barcode) as total,  count(case when qc_status = 'Pass' then 1 else NULL end) as pass_count, count(case when qc_status = 'Fail' then 1 else NULL end) as fail_count, count(case when qc_status = 'Sorry' then 1 else NULL end) as sorry_count  FROM `tbl_challan_data` WHERE 1 and qc_stage =1 GROUP by qc_stage

    
    public function pendingreport($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and Due_on between '".date('Y-m-d', strtotime($param['from_date']. ' + 1 days'))."' and '".date('Y-m-d', strtotime($param['to_date']. ' + 1 days'))."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        if (!empty($param['services'])) {
            $search_query.=" and Primary_Service='".$param['services']."'";
        }
        
        
        $sql="SELECT * FROM `tbl_challan_data` WHERE 1 and dispatch_status=0 $search_query order by Due_on, Store_Name";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }




    public function garmentreport($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and Due_on between '".date('Y-m-d', strtotime($param['from_date']. ' + 1 days'))."' and '".date('Y-m-d', strtotime($param['to_date']. ' + 1 days'))."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        if (!empty($param['services'])) {
            $search_query.=" and Primary_Service='".$param['services']."'";
        }
        
        
        $sql="SELECT tbl_challan_data.*, tbl_spot.spot_time, tbl_spot.station_id FROM tbl_challan_data left join tbl_spot on (tbl_spot.Barcode=tbl_challan_data.Barcode) WHERE 1  $search_query order by Due_on, Store_Name";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }



    public function pendingorderreport($param)
    {
        // print_r($param);
        
        if (!empty($param['order_no'])) {
            $search_query=" and Order_No='".$param['order_no']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        
        
        if ($search_query) {
            $sql="SELECT tbl_challan_data.*, tbl_spot.spot_time, tbl_spot.station_id FROM `tbl_challan_data` left join tbl_spot on (tbl_spot.Barcode=tbl_challan_data.Barcode) WHERE 1  $search_query";
            $query = $this->db->query($sql)->result_array();
            return $query;
        }
        return;
    }


 public function priorityorderreport($param)
    {
        // print_r($param);
        
        if (!empty($param['order_no'])) {
            $search_query=" and Order_No='".$param['order_no']."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        if (!empty($param['order_priority'])) {
            $search_query.=" and order_priority='".$param['order_priority']."'";
        }
        else
        {
             $search_query.=" and order_priority != 0";
        }

        $search_query.=" and dispatch_status=0";
        
        
       
            $sql="SELECT store_id, order_priority, Store_Name, count(Barcode) as total_garment, Order_No, count(case when packaging_stage = 1 then 1 else null end) as psc, Due_on, Primary_Service  FROM `tbl_challan_data` WHERE 1  $search_query group by store_id, Order_No ";
            $query = $this->db->query($sql)->result_array();
            return $query;
       
    }

    public function readytodispatch($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and Due_on between '".date('Y-m-d', strtotime($param['from_date']. ' + 1 days'))."' and '".date('Y-m-d', strtotime($param['to_date']. ' + 1 days'))."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
        if (!empty($param['services'])) {
            $search_query.=" and Primary_Service='".$param['services']."'";
        }
        
        
        $sql="SELECT store_id, Store_Name, count(Barcode) as total_garment, Order_No, count(case when packaging_stage = 1 then 1 else null end) as psc, Due_on, Primary_Service  FROM `tbl_challan_data` WHERE 1 and dispatch_status=0 $search_query group by store_id, Order_No ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

 
 
    public function dispatchreport($param)
    {
        // print_r($param);
        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $search_query=" and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) between '".date('Y-m-d', strtotime($param['from_date']))."' and '".date('Y-m-d', strtotime($param['to_date']))."'";
        } else {
            $search_query='';
        }
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        }
        
       
        
        
        $sql="SELECT store_id, Store_Name, count(Barcode) as total_garment, Order_No, Due_on, count(case when packaging_stage = 1 then 1 else null end) as psc, CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30') as dispatch_time, Primary_Service  FROM `tbl_challan_data` WHERE 1 and dispatch_status=1 $search_query group by store_id, Order_No ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getDispatchReportMail($param)
    {
        // print_r($param);
        
        $date=date('Y-m-d', strtotime($param['from_date']));
        
        
                
       
        $sql="select Due_on, count(Due_on) as total, COUNT(case when dispatch_status=1 and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) <= '".$date."' then 1 else null end) as total_dispatch_all, COUNT(case when dispatch_status=1 and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) = '".$date."' then 1 else null end) as total_dispatch, count(case WHEN default_service = 'DC' and (date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) >= '".$date."' or dispatch_status=0) then 1 else null end) as DC, count(case WHEN default_service = 'DC' and dispatch_status=1 and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) = '".$date."' then 1 else null end) as dc_dispatch, count(case WHEN default_service = 'Laundry' and (date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) >= '".$date."' or dispatch_status=0) then 1 else null end) as Laundry, count(case WHEN default_service = 'Laundry' and dispatch_status=1 and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) = '".$date."' then 1 else null end) as laundry_dispatch, count(case WHEN default_service = 'Shoe' and (date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) >= '".$date."' or dispatch_status=0) then 1 else null end) as Shoe , count(case WHEN default_service = 'Shoe' AND dispatch_status=1 and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) = '".$date."' then 1 else null end) as shoe_dispatch from (SELECT * from tbl_challan_data where 1  group by store_id, Order_No) as temp inner join (select Barcode, (select defualt_service_code FROM tbl_default_service where service_code=tbl_challan_data.Primary_Service) as default_service from tbl_challan_data) as tc on (temp.Barcode=tc.Barcode) where 1  group by Due_on";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


    public function getDispatchReportMailMonthly($param)
    {
        // print_r($param);
        
       
        

        
        if (!empty($param['from_date']) && !empty($param['to_date'])) {
            $date=date('Y-m-d', strtotime($param['from_date']." -1 days"));
            
            $search_query=" and Due_on >='".date('Y-m-02', strtotime($date))."' and Due_on <='".date('Y-m-d', strtotime(" +330 mins"))."'";
        } else {
            $search_query='';
        }
       
        
       
       
        
        $sql="select Due_on, count(Due_on) as total, COUNT(case when dispatch_status=1 and  date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) <= DATE_SUB(Due_on, INTERVAL 1 DAY) then 1 else null end) as total_dispatch, count(case WHEN default_service = 'DC' then 1 else null end) as DC, count(case WHEN default_service = 'DC' and dispatch_status=1  and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) <= DATE_SUB(Due_on, INTERVAL 1 DAY) then 1 else null end) as dc_dispatch, count(case WHEN default_service = 'Laundry' then 1 else null end) as Laundry, count(case WHEN default_service = 'Laundry' and dispatch_status=1  and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) <= DATE_SUB(Due_on, INTERVAL 1 DAY) then 1 else null end) as laundry_dispatch, count(case WHEN default_service = 'Shoe' then 1 else null end) as Shoe , count(case WHEN default_service = 'Shoe' AND dispatch_status=1  and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) <= DATE_SUB(Due_on, INTERVAL 1 DAY) then 1 else null end) as shoe_dispatch from (SELECT * from tbl_challan_data where 1 $search_query  group by store_id, Order_No) as temp inner join (select Barcode, (select defualt_service_code FROM tbl_default_service where service_code=tbl_challan_data.Primary_Service) as default_service from tbl_challan_data) as tc on (temp.Barcode=tc.Barcode) group by Due_on";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }





    public function updatedispatchchallan($store_id)
    {
        $sql="insert into tbl_challan (store_id, create_date) values (".$store_id.", now()) on duplicate key update  create_date=now()";
        $query = $this->db->query($sql);
    }

    public function sendchallan($param)
    {
        // print_r($param);
        
        /*
                if(!empty($param['from_date']) && !empty($param['to_date']))
                $search_query=" and date(CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30')) between '".date('Y-m-d', strtotime($param['from_date']))."' and '".date('Y-m-d', strtotime($param['to_date']))."'";
                else
        */

        $sql="select * from tbl_challan where store_id='".$param['store_id']."'";
        $query = $this->db->query($sql)->result_array();
    
    
        /*
            $sql="insert into tbl_challan (store_id, create_date) values (".$param['store_id'].", now()) on duplicate key update  create_date=now()";
            $query = $this->db->query($sql);

        */

        $search_query='';
 
        if ($query[0]['create_date']) {
            $search_query=" and dispatch_time > '".$query[0]['create_date']."'";
        }

       
        
        if (!empty($param['store_id'])) {
            $search_query.=" and store_id='".$param['store_id']."'";
        } else {
            $search_query.=" and store_id=0";
        }
       
        
        
        $sql="SELECT store_id, Store_Name, count(Barcode) as total_garment, Order_No, Due_on, count(case when packaging_stage = 1 then 1 else null end) as psc, CONVERT_TZ(dispatch_time, @@session.time_zone, '+05:30') as dispatch_time, Primary_Service  FROM `tbl_challan_data` WHERE 1 and dispatch_status=1 $search_query group by store_id, Order_No ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }




    public function get_all_services()
    {
        return $this->db->query("select Primary_Service from tbl_challan_data group by Primary_Service")->result_array();
    }




    /**************REPORTS END***************/



    public function dispatchorder($order_no, $store_id)
    {
        $sql="update tbl_challan_data set dispatch_status=1, dispatch_time='".date('Y-m-d H:i:s')."' where Order_No='".$order_no."' and store_id=".$store_id;
        $this->db->query($sql);
    }


    public function setPriority($params)
    {
         $sql="update tbl_challan_data set order_priority=".$params['order_priority']." where Order_No='".$params['order_no']."' and store_id=".$params['store_id'];
        $this->db->query($sql);
    }


    public function import_challan($param)
    {
        // foreach($params as $key => $value){
              
        $sql = $this->db->insert_string('tbl_challan_data', $param);// . ' ON DUPLICATE KEY UPDATE duplicate=LAST_INSERT_ID(duplicate)';
        $sql = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $sql);
        $this->db->query($sql);
        if (!$this->db->insert_id()) {
            $query=$this->db->where(array('initial_stage'=> 0, 'Barcode'=>$param['Barcode']))
                                    ->update('tbl_challan_data', $param);
            //print_r($this->db->last_query());
        };
           
  
        // }
    }
    
    
    
    
    
    public function challan_data($param)
    {
        $sql = $this->db->query("select * from tbl_challan_data where Order_Date between '".$param['from_date']."' and '".$param['to_date']."'")->result_array();
           
        //print_r($this->db->last_query());
        return $sql;
    }
    



   
    public function getBarcode($id)
    {
        return $this->db->get_where('tbl_challan_data', array('Barcode'=>$id))->row_array();
    }




    public function get_store_email($id, $table)
    {
        $this->db->select();
        $this->db->from($table);
        $this->db->where('store_id', $id);
        $query = $this->db->get()->row();
        // $query = $query->result_array();
        return $query;
    }


/********GET IMAGE BY QUERY*******/
public function getmailimages($order_no, $store_id)
    {
        $sql="select * from tbl_picture where tbl_picture.Barcode in (select tbl_challan_data.Barcode from tbl_challan_data where Order_No='".$order_no."' and store_id=".$store_id.")";
        return $this->db->query($sql)->result_array();
    }

    
    public function get_all_count_by_table($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }
      
    public function get_all_by_table($table, $params = array())
    {
        $this->db->order_by('id', 'desc');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get($table)->result_array();
    }
        
    //-- insert function
    public function insert_ignore($data, $table)
    {
        $insert_query = $this->db->insert_string($table, $data);
        $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
        $this->db->query($insert_query);
        return $this->db->insert_id();
    }


    //-- insert function
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    //-- edit function
    public function edit_option($action, $id, $table)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $action);
        return;
    }

    //-- update function
    public function update($action, $id, $table)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $action);
        return;
    }

    public function updateStoreOpenBalance($store_id, $open_bal)
    {
        $query="update stores set opening_balance=$open_bal where store_crm_code='".$store_id."'";
        $this->db->query($query);
    }


    //-- delete function
    public function delete($id, $table)
    {
        $this->db->delete($table, array('id' => $id));
        return;
    }

    //-- user role delete function
    public function delete_user_role($id, $table)
    {
        $this->db->delete($table, array('user_id' => $id));
        return;
    }


    //-- select function
    public function select($table)
    {
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    //-- select by id
    public function select_option($id, $table)
    {
        $this->db->select();
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    //-- check user role power
    public function check_power($type)
    {
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id', $this->session->userdata('id'));
        $this->db->where('ur.action', $type);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function check_email($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function check_exist_power($id)
    {
        $this->db->select('*');
        $this->db->from('user_power');
        $this->db->where('power_id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    //-- get all power
    public function get_all_power($table)
    {
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('power_id', 'ASC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    //-- get logged user info
    public function get_user_info()
    {
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c', 'c.id = u.country', 'LEFT');
        $this->db->where('u.id', $this->session->userdata('id'));
        $this->db->order_by('u.id', 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    //-- get single user info
    public function get_single_user_info($id)
    {
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c', 'c.id = u.country', 'LEFT');
        $this->db->where('u.id', $id);
        $query = $this->db->get();
        $query = $query->row();
        return $query;
    }

    //-- get single user info
    public function get_user_role($id)
    {
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id', $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }


    //-- get all users with type 2
    public function get_all_user()
    {
        $this->db->select('u.*');
        $this->db->select('c.name as country, c.id as country_id');
        $this->db->from('user u');
        $this->db->join('country c', 'c.id = u.country', 'LEFT');
        $this->db->order_by('u.id', 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }


    //-- count active, inactive and total user
    public function get_user_total()
    {
        $this->db->select('*');
        $this->db->select('count(*) as total');
        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 1)
                            )
                            AS active_user', true);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 0)
                            )
                            AS inactive_user', true);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.role = "admin")
                            )
                            AS admin', true);

        $this->db->from('user');
        $query = $this->db->get();
        $query = $query->row();
        return $query;
    }


    //-- image upload function with resize option
    public function upload_image($max_size)
    {
            
            //-- set upload path
        $config['upload_path']  = "./assets/images/";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
        $config['max_size']     = '92000';
        $config['max_width']    = '92000';
        $config['max_height']   = '92000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("photo")) {
            $data = $this->upload->data();

            //-- set upload path
            $source             = "./assets/images/".$data['file_name'] ;
            $destination_thumb  = "./assets/images/thumbnail/" ;
            $destination_medium = "./assets/images/medium/" ;
            $main_img = $data['file_name'];
            // Permission Configuration
            chmod($source, 0777) ;

            /* Resizing Processing */
            // Configuration Of Image Manipulation :: Static
            $this->load->library('image_lib') ;
            $img['image_library'] = 'GD2';
            $img['create_thumb']  = true;
            $img['maintain_ratio']= true;

            /// Limit Width Resize
            $limit_medium   = $max_size ;
            $limit_thumb    = 200 ;

            // Size Image Limit was using (LIMIT TOP)
            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

            // Percentase Resize
            if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                $percent_medium = $limit_medium/$limit_use ;
                $percent_thumb  = $limit_thumb/$limit_use ;
            }

            //// Making THUMBNAIL ///////
            $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
            $img['quality']      = ' 100%' ;
            $img['source_image'] = $source ;
            $img['new_image']    = $destination_thumb ;

            $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear() ;

            ////// Making MEDIUM /////////////
            $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
            $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
            $img['quality']      = '100%' ;
            $img['source_image'] = $source ;
            $img['new_image']    = $destination_medium ;

            $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear() ;

            //-- set upload path
            $images = 'assets/images/medium/'.$mid;
            $thumb  = 'assets/images/thumbnail/'.$thumb_nail;
            unlink($source) ;

            return array(
                    'images' => $images,
                    'thumb' => $thumb
                );
        } else {
            echo "Failed! to upload image" ;
        }
    }
    
    /*********Exception Report************/
    
      public function incomingtospot4pm($start_date, $end_date)
    {
        
       
        $sql="SELECT count(*) as total_incoming, SUM(case when spot_time  then 1 else 0 end) as total_spot
, SUM(case when (spot_time and HOUR(TIMEDIFF(initial_time, spot_time)) <=3)  then 1 else 0 end) as total_spot_ok, sum(case when spot_time then 0 else 1 end  ) as total_spot_pending, date_add(initial_time, INTERVAL 5.30 hour) as incoming FROM `tbl_challan_data` left join  (select * from tbl_spot group by Barcode) as spot on (spot.Barcode=tbl_challan_data.Barcode) WHERE 1 and initial_stage=1 and date_add(initial_time, INTERVAL 5.30 hour) BETWEEN '".$start_date."' and '".$end_date."'";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


 public function incomingtospot8am($start_date, $end_date, $to_end_date)
    {
        
       
         $sql="SELECT count(*) as total_incoming, SUM(case when spot_time  then 1 else 0 end) as total_spot
, SUM(case when (spot_time != '' and date_add(initial_time, INTERVAL 5.30 hour) <= date_add('".$start_date."', INTERVAL 3 hour) and HOUR(TIMEDIFF(initial_time, spot_time)) <=3) or (spot_time != '' and date_add(initial_time, INTERVAL 5.30 hour) >= date_add('".$start_date."', INTERVAL 3 hour) and date_add(spot_time, INTERVAL 5.30 hour) < '".$to_end_date."' ) then 1 else 0 end) as total_spot_ok, sum(case when spot_time then 0 else 1 end  ) as total_spot_pending, date_add(initial_time, INTERVAL 5.30 hour) as incoming FROM `tbl_challan_data` left join  (select * from tbl_spot group by Barcode) as spot on (spot.Barcode=tbl_challan_data.Barcode) WHERE 1 and initial_stage=1 and date_add(initial_time, INTERVAL 5.30 hour) BETWEEN '".$start_date."' and '".$end_date."'";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    
    
 public function spottingtoqc($start_date, $end_date, $to_end_date)
    {
        
       
         $sql="SELECT  SUM(case when spot_time then 1 else 0 end) as total_spot , SUM(case when (spot_time != '' and date_add(spot_time, INTERVAL 5.30 hour) <= date_add('".$start_date."', INTERVAL 3 hour) and HOUR(TIMEDIFF(qc_time, spot_time)) <=3) or (spot_time != '' and date_add(spot_time, INTERVAL 5.30 hour) >= date_add('".$start_date."', INTERVAL 3 hour) and date_add(qc_time, INTERVAL 5.30 hour) < '".$to_end_date."' ) then 1 else 0 end) as total_qc_ok, sum(case when qc_time then 1 else 0 end ) as total_qc_done, sum(case when qc_time then 0 else 1 end ) as total_qc_pending FROM `tbl_challan_data` left join (select * from tbl_spot group by Barcode) as spot on (spot.Barcode=tbl_challan_data.Barcode) WHERE 1 and date_add(spot_time, INTERVAL 5.30 hour) BETWEEN '".$start_date."' and '".$end_date."'";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }


public function qctopack($start_date, $end_date, $to_end_date)
    {
        
       
         $sql="SELECT SUM(case when qc_time then 1 else 0 end) as total_qc , SUM(case when (qc_time != '' and date_add(qc_time, INTERVAL 5.30 hour) <= date_add('".$start_date."', INTERVAL 2 hour) and HOUR(TIMEDIFF(qc_time, packaging_time)) <=3) or (qc_time != '' and date_add(qc_time, INTERVAL 5.30 hour) >= date_add('".$start_date."', INTERVAL 2 hour) and date_add(packaging_time, INTERVAL 5.30 hour) < '".$to_end_date."' ) then 1 else 0 end) as total_pack_ok, sum(case when packaging_time then 1 else 0 end ) as total_pack_done, sum(case when packaging_time then 0 else 1 end ) as total_pack_pending FROM `tbl_challan_data`  WHERE 1 and date_add(qc_time, INTERVAL 5.30 hour) BETWEEN '".$start_date."' and '".$end_date."'";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
}