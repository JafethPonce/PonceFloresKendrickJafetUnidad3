<?php 
require_once("./connect.php");
extract($_POST);

$totalCount = $conn->query("SELECT * FROM `productos` ")->num_rows;
$search_where = "";
if(!empty($search)){
    $search_where = " where ";
    $search_where .= " descripcion	 LIKE '%{$search['value']}%' ";
    $search_where .= " OR costo LIKE '%{$search['value']}%' ";
    $search_where .= " OR stock LIKE '%{$search['value']}%' ";
    $search_where .= " OR codigo LIKE '%{$search['value']}%' ";
}
$columns_arr = array("id",
                     "descripcion",
                     "costo",
                     "stock",
                     "codigo");
$query = $conn->query("SELECT * FROM `productos` {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
$recordsFilterCount = $conn->query("SELECT * FROM `productos` {$search_where} ")->num_rows;

$recordsTotal= $totalCount;
$recordsFiltered= $recordsFilterCount;
$data = array();
$i= 1 + $start;
while($row = $query->fetch_assoc()){
    $row['no'] = $i++;
    $data[] = $row;
}
echo json_encode(array('draw'=>$draw,
                       'recordsTotal'=>$recordsTotal,
                       'recordsFiltered'=>$recordsFiltered,
                       'data'=>$data
                       )
);
