<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- content here -->
    <div class="card shadow mb-4">
    	<div class="card-header py-3">
      		<h6 class="m-0 font-weight-bold text-primary">All Tenants</h6>
    	</div>
        <div class="card-body">
          	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                	<tr>
                  		<th>Name</th>
                    	<th>Email</th>
                      	<th>Date Join</th>
                      	<th>Status</th>
                      	<th>Action</th>
                	</tr>
              	</thead>
              	<tbody>
              		<?php foreach($tenants as $user):?>
                    	<tr>
                          <td><?= $user['name']?></td>
                          <td><?= $user['email']?></td>
                          <td><?= date('d F Y', $user['date_created']); ?></td>
                          <td><?php if($user['is_active']==0){ echo "Non-active";}else{echo "Active";}?></td>
                          <td><a href="#" class="btn btn-small"><i class="fas fa-eye"></i></a></td>
                      </tr>
            		<?php endforeach;?>
              	</tbody>
            </table>
          </div>
        </div>
      </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
