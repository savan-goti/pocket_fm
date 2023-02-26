<?php include('layout/header.php');?>
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Banner</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Banner</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Benner
                    <a href="banner_add.php" class="btn btn-info btn-rounded float-right"><i class="fas fa-plus"></i> Add</a>
                    <!-- <button type="button" class="btn btn-info btn-rounded float-right" data-toggle="modal"
                        data-target="#add-contact"><i class="fas fa-plus"></i> Add</button> -->
                </h4>

                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Banner</th>
                                <th>Url</th>
                                <th>Banner type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM tblbanner";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><img src="../banner_image/<?php echo ($row['image'])?$row['image']:'Placeholder.jpg'; ?>" alt="image" style="width:100px;height: 70px;"></td>
                                <!-- <td><img src="../banner_image/<?php echo ($row['image'])?$row['image']:'Placeholder.jpg'; ?>" alt="image"></td> -->
                                <td><?= $row['url'] ?></td>
                                <td><?= $row['type'] ?></td>
                                <td>
                                    <a href="banner_add.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Contact Popup Model -->
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
            </div>
            <div class="modal-body">
                <from class="form-horizontal form-material">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Type name">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Designation">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Age">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Date of joining">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Salary">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i
                                        class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                <input type="file" class="upload">
                            </div>
                        </div>
                    </div>
                </from>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php include('layout/footer.php');?>