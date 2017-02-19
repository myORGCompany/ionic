<style type="text/css">
	.margin-left-100{margin-left: 10% !important;}
  .margin-top-30{margin-top: 30px !important;}
	.form-group{margin-bottom: 5px !important;}
	.control-label{text-align: left !important;}
</style>

<body>
<div id="wrapper">
<?php $userData =$this->Session->read('User'); ?>
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                <?php if (empty($userData[id]) ){ ?>
                        <h2>Login</h2>
                <?php } else { ?>
                    <h2><a href="<?php echo ABSOLUTE_URL;?>/logout">Logout</a></h2>
                    <h2><a href="<?php echo ABSOLUTE_URL;?>/pages/productList"> Products</a></h2>
                <?php } ?>
                </a>
            </li>
            
        </ul>
    </div>
	<div class="container">
		<div class="row col-lg-12 well">
    <h3 style="margin-top:0px;">Products</h3>
			<div class="padding-left-15">
        <nav>
          <ul class="pagination col-md-10 margin-left-100">
            <?php $alphas = range('A', 'Z');
            foreach ($alphas as $key => $value) {?>
            <li><a href="<?php echo ABSOLUTE_URL;?>/pages/productList?page=<?php echo $value;?>"><?php echo $value;?></a></li><?php }
            ?>
            <div class="clearfix"></div>
            <ul class="pager">
            <li><a href="#" id ="prevRes" >Previous</a></li>
            <li><a href="#" id="nextRes">Next</a></li>
          </ul>
          </ul>
        </nav>
        </div>
<div class="col-md-12">
<table class="table table-striped table-responsive">
	<tr>
		<td><strong>#</strong></td>
   		<td><strong>Barcode</strong></td>
   		<td><strong>Name</strong></td>
   		<td><strong>Description</strong></td>
   		<td><strong>Price</strong></td>
   		<td><strong>Image</strong></td>
      <!-- <td><strong>Action</strong></td> -->
   </tr>
	<?php foreach ( $NameArray as $key => $value) {
        if(!empty($value['Product']['barcode'])) { ?>
           <tr id="<?php echo 'list'.$key;?>" class='hidden'>
           		<td><strong><?php echo $key;?></strong></td>
           		<td><?php echo $value['Product']['barcode'];?></td>
           		<td><?php echo $value['Product']['name'];?></td>
           		<td><?php echo $value['Product']['description'];?></td>
           		<td><?php echo $value['Product']['price'];?></td>
           		<td><?php echo $value['Product']['image_path'];?></td>
           		<?php  /* <td><a  rel="nofollow" onclick="deletePerticular(<?php echo $value['Product']['id'];?>);"> Delete </a> </td> */?>
           </tr>
        <?php $nbr = $key+1;
        } }
          $cnt = count($NameArray);
          $intpage = 25;
          ?>
</table>
<ul class="pager">
    <li><a href="<?php echo ABSOLUTE_URL;?>/pages/productList" id ="prevRes" >View All</a></li>
  </ul>
</div>


<script type="text/javascript">
$(document).ready(function() {
var cnt = <?php echo $cnt;?>;
 for (var i = 0; i < 25; i++) {
    $("#list"+i).show();
  $("#list"+i).removeClass('hidden');
}

var intpage = <?php echo $intpage;?>;
$("#nextRes").click(function() { 
if(intpage < cnt) {
var res = intpage +25;
for (var i = intpage; i < res; i++) {
    $("#list"+i).show();
  $("#list"+i).removeClass('hidden');
}
 for (var i = intpage; i >= 0; i--) {
            $("#list"+i).hide();
             $("#list"+i).addClass('hidden');
           }
           intpage = intpage +25;
}
else{
    alert("End of list please go to previous page");
}
});
$("#prevRes").click(function() { 
if(intpage >49) {
var res = intpage -25;
preres = res -25;
for (var i = res; i < intpage; i++) {
  $("#list"+i).hide();
  $("#list"+i).addClass('hidden');
}
var temp =res;
 for (var i = 0; i <= 25; i++) {
    if(temp>=0){
  temp--;
  $("#list"+temp).show();
  $("#list"+temp).removeClass('hidden');
  }
  else{
    break;
  }       
}
}
else{
    alert("End of list please go to next page");
}
intpage = intpage -25;
});
});
function deletePerticular(id){
  confirm("Are you sure");
    $.ajax({
        dataType: "JSON",
        url: "<?php echo ABSOLUTE_URL ;?>/pages/deleteProduct",
        data: $('#login_form').serialize(),
        type: "POST",
        success: function(res) {
            alert("success")
        }
    });
}
</script>
		</div>
	</div>
</body>