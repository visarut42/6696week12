<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลพนักงาน</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $employee_id=$_GET['employee_id'];
    $sql="SELECT * FROM employees WHERE employee_id=$employee_id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>
<h1>แก้ไขข้อมูลพนักงาน</h1>


<form action="edit_1.php" method="POST">
    <input type="hidden"name="employee_id" value="<?php echo$row['employee_id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัสพนักงาน </label>
        <div class="col-sm-2">
        <label class="col-sm-1 col-form-label"> <?php echo$row['employee_id']; ?> </label>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ชื่อพนักงาน </label>
        <div class="col-sm-2">
        <input type="text" name="first_name" class="form-control" maxlength="50" value="<?php echo$row['first_name']; ?>" required>
        </div>
    </div>

  
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> นามสกุลพนักงาน </label>
        <div class="col-sm-2">
        <input type="text" name="last_name" class="form-control" maxlength="50" value="<?php echo$row['last_name']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> แผนก </label>
        <div class="col-sm-2">
        <select name="department" class="form-select" aria-label="Default select example">
            <option >กรุณาระบุแผนก</option>
            <option value="ฝ่ายไอที"<?php if ($row['department']=='ฝ่ายไอที'){ echo "selected";} ?>>ฝ่ายไอที</option>
            <option value="ฝ่ายบุคคล"<?php if ($row['department']=='ฝ่ายบุคคล'){ echo "selected";} ?>>ฝ่ายบุคคล</option>
            <option value="ฝ่ายการตลาด"<?php if ($row['department']=='ฝ่ายการตลาด'){ echo "selected";} ?>>ฝ่ายการตลาด</option>
            <option value="ฝ่ายบัญชี"<?php if ($row['department']=='ฝ่ายบัญชี'){ echo "selected";} ?>>ฝ่ายบัญชี</option>
            <option value="ฝ่ายผลิต"<?php if ($row['department']=='ฝ่ายผลิต'){ echo "selected";} ?>>ฝ่ายผลิต</option>
        </select> 
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> เพศ </label>
        <div class="col-sm-2">
        <select name="gender" class="form-select" aria-label="Default select example">
            <option >กรุณาระบุเพศ</option>
            <option value="ชาย"<?php if ($row['gender']=='ชาย'){ echo "selected";} ?>>เพศชาย</option>
            <option value="หญิง"<?php if ($row['gender']=='หญิง'){ echo "selected";} ?>>เพศหญิง</option>
            <option value="อื่นๆ"<?php if ($row['gender']=='อื่นๆ'){ echo "selected";} ?>>LGBTQ+</option>
        </select> 
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> อายุ </label>
        <div class="col-sm-2">
        <input type="text" name="age" class="form-control" maxlength="50" value="<?php echo$row['age']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> เงินเดือน </label>
        <div class="col-sm-2">
        <input type="text" name="salary" class="form-control" maxlength="50" value="<?php echo$row['salary']; ?>" required>
        </div>
    </div>
   
    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>

</form>
<br>
พัฒนาโดย 664485042 นาย วิศรุต จงพึ่งกลาง  หมู่เรียน 66/96 <br>
</head>

</html>