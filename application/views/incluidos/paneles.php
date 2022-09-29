<?php
/*
esta pagna contiene los bloques superiores de la principal
Se colocan en un include porque es posible que se usan solo en ella o en otro lado
*/

?>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="<?php echo site_url('pacientes');?>"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PACIENTES</div></a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php  

                        //$this->load->database();  

                        $query = $this->db->query("SELECT id FROM tblpacientes ORDER BY id");
                        echo '<h1> '.$query->num_rows().'</h1>'; 


                        //$connection=mysqli_connect("localhost","root","","salud_total");
                       // $query="SELECT id FROM tblpacientes ORDER BY id";
                       // $query_run=mysqli_query($connection,$query);

                      //  $row=mysqli_num_rows($query_run);
                     //   echo'<h1> '.$row.'</h1>';
                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="<?php echo site_url('medicos');?>"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">MÉDICOS</div></a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                        <?php  
                        
                        //$this->load->database(); 

                        $query = $this->db->query("SELECT id FROM tblmedicos ORDER BY id");
                        echo '<h1> '.$query->num_rows().'</h1>';  

                        //$connection=mysqli_connect("localhost","root","","salud_total");
                        //$query="SELECT id FROM tblmedicos ORDER BY id";
                       // $query_run=mysqli_query($connection,$query);

                       // $row=mysqli_num_rows($query_run);
                      //  echo'<h1> '.$row.'</h1>';
                        ?>
                        

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="<?php echo site_url('historiaclinica');?>"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Historias Clínicas</div></a>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                        <?php  
                        
                        //$this->load->database();  

                        $query = $this->db->query("SELECT id FROM tblhistoriaclinica ORDER BY id");
                        echo '<h1> '.$query->num_rows().'</h1>'; 

                        //$connection=mysqli_connect("localhost","root","","salud_total");
                        //$query="SELECT id FROM tblhistoriaclinica ORDER BY id";
                        //$query_run=mysqli_query($connection,$query);

                        //$row=mysqli_num_rows($query_run);
                        //echo'<h1> '.$row.'</h1>';
                        ?>
                          
                        </div>
                        </div>
                        <div class="col">
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="<?php echo site_url('citas');?>"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Citas</div></a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 

                        $query = $this->db->query("SELECT id FROM tblcitas ORDER BY id");
                        echo '<h1> '.$query->num_rows().'</h1>'; 

                        //$connection=mysqli_connect("localhost","root","","salud_total");
                        //$query="SELECT id FROM tblcitas ORDER BY id";
                        //$query_run=mysqli_query($connection,$query);

                        //$row=mysqli_num_rows($query_run);
                        //echo'<h1> '.$row.'</h1>';

                        ?>
                    

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-day fa-2x text-gray-300"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
        
          </div>

