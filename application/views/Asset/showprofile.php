<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center" style="margin: -1rem;">
            <img src="<?php echo $this->session->userdata['adminprofile']['image'];?>" alt="avatar"
              class="img-fluid" style="width: 50%;height:50%">
            <h5 class="my-3"><?php echo $this->session->userdata['adminprofile']['name']; ?></h5>            
          </div>
        </div>
        <div class="col-md-12" align="center" style="margin-top: -1rem;"> 
          <?php echo "<a class='btn btn-primary btn-sm' href='editprofile?id=".$this->session->userdata['adminprofile']['id']."'><strong>Edit Profile</strong></a>";?>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $this->session->userdata['adminprofile']['name']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $this->session->userdata['adminprofile']['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $this->session->userdata['adminprofile']['phone']; ?></p>
              </div>
            </div>
          </div>
        </div>
        

      </div>
    </div>
  </div>
</section>
