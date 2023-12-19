<script type="text/javascript">
$(document).ready(function(){

var visitedate = '<?php echo $vpvcDataRow->visitdate;  ?>';

function getStartDate() {
var arr = visitedate.split('-');
var Month = parseInt(arr[1]);
var today = new Date();
if((Month-1) == today.getMonth()){
var ourStartDate = new Date(today.getFullYear(), today.getMonth());
}else{
var ourStartDate = new Date(today.getFullYear(), today.getMonth() + 1, 1);
}
return ourStartDate;
}
function getEndDate() {
var arr = visitedate.split('-');
var Month = parseInt(arr[1]);
var today = new Date();
if((Month-1) == today.getMonth()){
var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
}else{
var lastDate = new Date(today.getFullYear(), today.getMonth() + 2, 0);
}
return lastDate;
}
$('.dp1').datepicker({
format : "dd-mm-yyyy",
startDate: getStartDate(),
endDate: getEndDate()
});
});
</script>