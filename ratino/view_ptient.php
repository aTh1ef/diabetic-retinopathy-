<?php
    session_start();

    require_once 'include/connection.php';
    // if(!isset($_SESSION['login']))
    // {
    //     header("Location: index.php");
    // }


    if (isset($_GET['del']))
 {
        if(mysqli_query($conn,"delete from patient_master  where id = '" . $_GET['id'] . "'")) {
        echo "<script>alert('patient record deleted successfully..!');location.href='view_ptient.php';</script>";
    } else {
        echo "<script>alert('Unable to delete patient record..!')</script>";
        // echo mysqli_error($conn);
    }
}

    ?>


  <main id="main" style="background-color:cornflowerblue;">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

    <?php
    require_once 'include/header-link.php';
   ?>

<?php
    require_once 'include/header.php';
?>

<div style="margin-top: 50px;">
<div class="card card_border p-lg-5 p-3 mb-4">
<h4>View Patient</h4>
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select * from patient_master order by id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>                                 
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>

                                            <td><?php echo htmlentities($row['full_name']);?>
                                            </td>

                                            <td><?php echo htmlentities($row['email']);?>
                                           </td>

                                            
                                            <td> <?php if($row['status']){echo 'Active';}else{echo 'In-Active';}?>
                                            </td>
                                            
                                            <td class="text-center">
                                                <a href="view_ptient.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">delete</a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; 
                                    } ?>
                                </tbody>            
                            </table>
            </div>
          </div>
        </div>

</div>

  </section><!-- End About Us Section -->

  </main><!-- End #main -->

  <?php
    require_once 'include/footer.php';
?>

<?php
    require_once 'include/footer-link.php';
?>
 
        
           