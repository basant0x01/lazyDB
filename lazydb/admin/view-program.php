<?php include "view-program-header.php"; ?>

          <?php
            $program_id = $_GET['program_id'];
            $query = "select * from my_projects where program_id=$program_id";
            $result = mysqli_query($con,$query);

            // Plateform | Program | <Subdomains> Search Trick
            while($row = mysqli_fetch_assoc($result)){
          ?>

<!-- card start  -->
    <div class="cards">
        <div class="card">
            <div class="card-content">
                <label>Program Name</label>
                <div class="card-name"><?php echo $row['program_name']; ?></div>
            </div>
        </div>



                    <?php

                  $program_id = $_GET['program_id'];
                  $query = "SELECT program_subdomains, program_manual_subdomains FROM my_projects WHERE program_id = $program_id";
                  $result = mysqli_query($con, $query);

                  $subdomains = '';

                  if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          $subdomain_string = $row['program_subdomains'] . ',' . $row['program_manual_subdomains'];
                          $subdomain_array = explode(",", $subdomain_string); // Assuming subdomains are separated by commas
                          foreach ($subdomain_array as $subdomain) {
                              // Trim to remove leading/trailing whitespaces
                              $subdomains .= trim($subdomain) . "\n";
                          }
                      }
                  }

                  $total_subdomains = count(explode("\n", trim($subdomains)));

                  ?>


        <div class="card">
            <div class="card-content">
                <div style="color: darkred;" class="number"><?php echo $total_subdomains; ?></div>
                <label>Total Subdomains</label>
            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="number">N/A</div>
                <div class="card-name">N/A</div>
            </div>
            <div class="icon-box">
                <i class="fas fa-bed"></i>
            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="number">N/A</div>
                <div class="card-name">N/A</div>
            </div>
            <div class="icon-box">
                <i class="fas fa-dollar-sign"></i>
            </div>
        </div>
    </div>
    <!-- cards end  -->


    <?php } ?>