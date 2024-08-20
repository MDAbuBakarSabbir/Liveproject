<?php
    include("main/extends/header.php");
    $user_query = "SELECT * FROM admins";
    $users = mysqli_query($db,$user_query);
?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
               <h3> Admin's Information</h3>
            </div>
            <div class="card-body">
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $num = 1;
                                foreach ($users as $user) {?>
                                <th scope="row"><?= $num++?></th>
                                <td><?=($user['name'])?></td>
                                <td><?=($user['email'])?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("main/extends/footer.php");?>