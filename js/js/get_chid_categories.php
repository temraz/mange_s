
<?php
include('dbcon.php');
if ($_REQUEST) {
    $id = $_REQUEST['parent_id'];
    $query = "select * from sub_department where department_id = " . $id;
    $results = mysql_query($query);
    ?>
    <select name="sub_dept"  id="sub_category_id">
        <option value="" selected="selected"></option>
        <?php
        while ($rows = mysql_fetch_assoc(@$results)) {
            ?>
            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
        <?php }
        ?>
    </select>	

    <?php
}
?>