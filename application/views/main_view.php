<!DOCTYPE html>
<html>

<head>
    <title>My View</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>

    <h1>My form</h1>

    <div style="margin: 80px;">
        <form method="post" action="<?php echo base_url() ?>main/form_validation">
            <?php
            if ($this->uri->segment(2) == "inserted") {
                echo '<p class="text-success">Data inserted successfully</p>';
            }

            if ($this->uri->segment(2) == "deleted") {
                echo '<p class="text-success">Data deleted successfully</p>';
            }
            ?>


            <?php

            if (isset($user_data)) {

                foreach ($user_data->result() as $rows) {
            ?>

                    <div class="form-group">
                        <label>Fname</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $rows->fname; ?>" />
                        <span class="text-danger"><?php echo form_error('fname'); ?></span>

                        <label>Mname</label>
                        <input type="text" name="mname" class="form-control" value="<?php echo $rows->lname; ?>" />
                        <span class="text-danger"><?php echo form_error('mname'); ?></span>


                        <label>Lname</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $rows->last; ?>" />
                        <span class="text-danger"><?php echo form_error('lname'); ?></span>

                    </div>
                    <div class="form-group">
                        <input type="hidden" name="hidden_id" value="<?php echo $rows->id ?>" />
                        <input type="submit" name="update" value="Update" class="btn btn-info" />
                    </div>

                <?php
                }
            } else {
                ?>

                <div class="form-group">
                    <label>Fname</label>
                    <input type="text" name="fname" class="form-control" />
                    <span class="text-danger"><?php echo form_error('fname'); ?></span>

                    <label>Mname</label>
                    <input type="text" name="mname" class="form-control" />
                    <span class="text-danger"><?php echo form_error('mname'); ?></span>


                    <label>Lname</label>
                    <input type="text" name="lname" class="form-control" />
                    <span class="text-danger"><?php echo form_error('lname'); ?></span>

                </div>
                <div class="form-group">
                    <input type="submit" name="insert" value="Insert" class="btn btn-info" />
                </div>

            <?php
            }

            ?>

        </form>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Fname</th>
                    <th>Mname</th>
                    <th>Lname</th>
                    <th>Action</th>
                </tr>
                <?php

                if ($fetch_users->num_rows() > 0) {

                    foreach ($fetch_users->result() as $row) {
                ?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->fname ?></td>
                            <td><?php echo $row->lname ?></td>
                            <td><?php echo $row->last ?></td>
                            <td><a href="#" class="delete_data" id="<?php echo $row->id ?>">Delete</a></td>
                            <td><a href="<?php echo base_url(); ?>main/update_data/<?php echo $row->id; ?>">Edit</a></td>
                        </tr>

                    <?php
                    }
                } else {
                    ?>

                    <tr colspan="4">No Data Found</tr>

                <?php
                }

                ?>
            </table>

            <script>
                $(document).ready(function() {
                    $('.delete_data').click(function() {
                        var id = $(this).attr("id");
                        if (confirm("Are you sure you want to delete?")) {
                            window.location = "<?php echo base_url(); ?>main/delete_data/" + id;
                        } else {
                            return false;
                        }
                    });
                });
            </script>

        </div>
    </div>

</body>

</html>