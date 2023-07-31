<?php
    require_once 'layout/header.php';
    // include 'layout/function.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
<section class="intro">
  <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
      <div class="container mt-5 mb-5" style="max-width: 1800px;">
      <div style="display: flex;">
        <div class="input-group mb-3" style="width: 500px;margin-right: 770px;">
            <input type="text" class="form-control" placeholder="Search" name="search" id="searchInput" required>
            <button type="button" class="btn btn-primary" id="searchBtn">Search</button>
        </div>
        <div class="input-group mb-3" style="width: 500px;margin-left: 630px;">
            <div id="slider-wrap" style="color: wheat;width: 220px;">
                <div style="margin-left: 30px;">
                  <label>Age Between</label>
                  <span id="age"></span>
                </div>
                <div id="slider-range"></div>
            </div>
        </div>
      </div>
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card bg-dark shadow-2-strong">
              <div class="card-body" id="table_data"> 
                <div class="table-responsive">
                  <table class="table table-dark table-borderless mb-0" id="dataTable">
                    <thead>
                      <tr id="tableHeaders">
                        <th scope="col">Image</th>
                        <th scope="col" class="sortable" data-column="first_name">First Name <span id="fnameSortIcon"></span></th>
                        <th scope="col" class="sortable" data-column="last_name">Last Name <span id="lnameSortIcon"></span></th>
                        <th scope="col" class="sortable" data-column="email">Email <span id="emailSortIcon"></span></th>
                        <th scope="col" class="sortable" data-column="gender">Gender<span id="genderSortIcon"></span></th>
                        <th scope="col" class="sortable" data-column="age">Age <span id="ageSortIcon"></span></th>
                        <th scope="col" class="sortable" data-column="hobbies">hobbies <span id="hobbySortIcon"></span></th>                      
                        <th scope="col" class="sortable" data-column="Date_of_birth">Date <span id="dobSortIcon"></span></th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                  </table>
                  <div class="pagination-container mt-2">
                    <nav aria-label="...">
                      <ul class="pagination float-end" id="pagination"></ul>
                    </nav>
                  </div>
                </div>
                <a href='login.php'>
                      <button type="button" style="width:170px" class="btn btn-danger mx-auto bg-alert float-end me-1">Logout</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'layout/footer.php'; ?>
</body>
</html>
