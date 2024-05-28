<?php 
require_once("./connect.php");
extract($_POST);

$totalCount = $conn->query("SELECT * FROM `info_user` ")->num_rows;
$search_where = "";
if(!empty($search)){
    $search_where = " where ";
    $search_where .= " nombre	 LIKE '%{$search['value']}%' ";
    $search_where .= " OR apellidos LIKE '%{$search['value']}%' ";
    $search_where .= " OR celular LIKE '%{$search['value']}%' ";
    $search_where .= " OR email LIKE '%{$search['value']}%' ";
}
$columns_arr = array("nombre",
                     "apellidos",
                     "celular",
                     "email");
$query = $conn->query("SELECT * FROM `info_user` {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
$recordsFilterCount = $conn->query("SELECT * FROM `info_user` {$search_where} ")->num_rows;

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
