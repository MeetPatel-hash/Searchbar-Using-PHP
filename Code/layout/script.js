$(document).ready(function () {
    $.validator.addMethod('whitespace', function(value, element) {
        return this.optional(element) || /^\S/.test(value);
    }, "Please enter valid name");

    $.validator.addMethod('onlylettersAndSpace', function(value, element) {
        var regex = /^[a-zA-Z ]+$/;
        return regex.test(value);
    }, "Please enter valid name");

    $.validator.addMethod('imgsize',(value, element, param) => {
        const limit = parseInt(param)*1024*1024;
        const size = element.files['0'].size;
        if(size > limit){
             return false;
        }
         return true;
    }, "File size should be less then 1mb"); 
 
    $.validator.addMethod('extension', function(value, element, param) {
        param = typeof param === 'string' ? param.replace(/,/g, '|') : 'png|jpe?g';
        return this.optional(element) || value.match(new RegExp('\\.(' + param + ')$', 'i'));
    }, "Only {0} images are allowed.");

    $(document).ready(function() {
        $('#imgPreview').css("border", "none");

        // When the image is selected, show the image border.
        $("#image").change(function() {
          $("#imgPreview").css("border", "1px solid black");
          $("#imgPreview").css("height", "100px");
          $("#imgPreview").css("width", "200px");
          $("#imgPreview").css("margin-left", 140);
          $("#imgPreview").css("margin-bottom", 15);
        });
        // When the image is selected, preview it in the <img> element.
        $("#image").change(function() {
          var reader = new FileReader();
          reader.onload = function() {
            $("#imgPreview").attr("src", reader.result);
          };
          reader.readAsDataURL(this.files[0]);
        });
      });
      

    $('#user').validate({
        rules :{
            fname:{
              required:true,
              whitespace:true,   
              onlylettersAndSpace: true,         
            },
            lname:{
                required:true,
                whitespace:true,   
                onlylettersAndSpace: true, 
            },
            email:{
                required:true,
                email: true,
            },
            password:{
                required:true,   
                minlength:8,
            },
            dob:{
                    required:true,
            },
             gender:{
                required:true,
            },
            age: {
                required: true,
                maxlength: 2,
                min: 10,
                max: 100,
            },
            'hobby[]':{
                required:true,
            },
            image:{
                required:true,               
                imgsize:1,
                extension:true,               
            },
        },
        messages:{
            fname:{
                required:"Name is required",
            },
            lname:{
                required:"Last name is required",
            },
            email:{
                required:"Email is required",
            },
            password:{
                required:"Password is mandatory",   
                minlength:"Please enter atleast 8 character",
            },
             dob:{
                required:"Please select Date",
            },
            gender:{
                required:"Please select gender",
            },
            age: {
                required: "Please enter your age.",
                maxlength: "Please enter valid age.",
                min: "Minimum age is 10.",
                max: "Maximum age is 10.",
            },
            'hobby[]':{
                required:"Please select hobby",
            },
            image:{
                extension:"Upload only jpeg, png, jpg, gif format",
                required:"Please upload image"
            },           
        }
    });

    $('#login').validate({ 
        rules :{
            loginemail:{
                required:true,
                email: true,
            },
            loginpass:{
                required:true,   
                minlength:8,
            },
        },
        messages:{
            loginemail:{
                required:"Email is required",
            },  
            loginpass:{
                required:"Password is required",   
                minlength:"Please enter atleast 8 character",
            },
        }
    });

    var v1 = 0;
    var v2 = 100;

    $(document).ready(function() {
      var currentPage = 1;
      var recordsPerPage = 4; // Adjust this value as needed
  
      function fetchData(page, searchQuery, sortBy, sortOrder, range1, range2) {
          $.ajax({
              url: 'layout/fetch_results.php',
              type: 'POST',
              data: {
                  page: page,
                  recordsPerPage: recordsPerPage,
                  searchQuery: searchQuery,
                  sortBy: sortBy,
                  sortOrder: sortOrder,
                  range1: range1,
                  range2: range2
              },
              dataType: 'json',
              success: function(response) {
                  var results = response.results;
                  var totalRecords = response.totalRecords;
                  var totalPages = Math.ceil(totalRecords / recordsPerPage);
  
                  // Clear the table body
                  $('#tableBody').empty();
  
                  // Update the table with the fetched data
                  for (var i = 0; i < results.length; i++) {
                      var row = results[i];
                      var tableRow = '<tr>' +
                          '<td><img src="image/' + row.image + '" width="50"></td>' +
                          '<td>' + row.first_name + '</td>' +
                          '<td>' + row.last_name + '</td>' +
                          '<td>' + row.email + '</td>' +
                          '<td>' + row.gender + '</td>' +
                          '<td>' + row.age + '</td>' +
                          '<td>' + row.hobbies + '</td>' +
                          '<td>' + row.Date_of_birth + '</td>' +
                          '<td>' +
                          '<a href="update.php?id=' + row.id + '"><button type="button" class="btn btn-primary">UPDATE</button></a>' +
                          ' <a href="delete.php?id=' + row.id + '" onclick="return confirm(\'Are you sure to delete?\')"><button type="button" class="btn btn-primary">DELETE</button></a>' +
                          '</td>' +
                          '</tr>';
  
                      $('#tableBody').append(tableRow);
                  }
  
                  // Update the pagination links
                  updatePagination(currentPage, totalPages);
              },
              error: function(xhr, status, error) {
                  console.error('AJAX Error: ' + status + ' - ' + error);
              }
          });
  
      }

      $("#slider-range").slider({
        range: true,
        min: 10,
        max: 100,
        values: [v1, v2],
        slide: function(event, ui) {
            $("#age").html(ui.values[0] + " - " + ui.values[1]);
            v1 = ui.values[0];
            v2 = ui.values[1];
            updateData(); // Fetch data when the age slider changes
        }
    });

    $("#age").html($("#slider-range").slider("values", 0) +
        " - " + $("#slider-range").slider("values", 1));

  
      function updatePagination(currentPage, totalPages) {
          var paginationContainer = $('#pagination');
          paginationContainer.empty();
  
          // Previous page link
          if (currentPage > 1) {
              paginationContainer.append('<li class="page-item"><a class="page-link" href="#" id="prev">Previous</a></li>');
          } else {
              paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>');
          }
  
          // Page links
          for (var i = 1; i <= totalPages; i++) {
              if (i === currentPage) {
                  paginationContainer.append('<li class="page-item active"><a class="page-link" href="#" id="' + i + '">' + i + '</a></li>');
              } else {
                  paginationContainer.append('<li class="page-item"><a class="page-link" href="#" id="' + i + '">' + i + '</a></li>');
              }
          }
  
          // Next page link
          if (currentPage < totalPages) {
              paginationContainer.append('<li class="page-item"><a class="page-link" href="#" id="next">Next</a></li>');
          } else {
              paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Next</a></li>');
          }
      }
  
      // Event listener for page link clicks
      $(document).on('click', '.page-link', function(e) {
          e.preventDefault();
          var pageId = $(this).attr('id');
  
          if (pageId === 'prev' && currentPage > 1) {
              currentPage--;
          } else if (pageId === 'next') {
              currentPage++;
          } else {
              currentPage = parseInt(pageId);
          }
  
          var searchQuery = $('#searchInput').val();
          fetchData(currentPage, searchQuery, currentSortColumn, currentSortOrder, v1, v2);
  
      });
  
      // Update the function to fetch data based on search input
      function updateData() {
          var searchQuery = $('#searchInput').val();
          currentPage = 1;
          fetchData(currentPage, searchQuery, currentSortColumn, currentSortOrder, v1, v2);
      }
  
      $('#searchBtn').on('click', updateData);
  
      // Event listener for keyup in the search input field
      $('#searchInput').on('keyup', function() {
          updateData();
      });
  
      // Variable to track the current sorting column and order
      var currentSortColumn = '';
      var currentSortOrder = 'ASC';
  
      // Variable to track the current sorting column and order
      var currentSortColumn = localStorage.getItem('currentSortColumn') || 'first_name';
      var currentSortOrder = localStorage.getItem('currentSortOrder') || 'ASC';
  
      // Function to handle column sorting on click
      function handleSort(sortBy) {
          var sortOrder = 'ASC';
  
          // If the clicked column is already sorted, toggle the sort order
          if (sortBy === currentSortColumn) {
              sortOrder = currentSortOrder === 'ASC' ? 'DESC' : 'ASC';
          }
  
          currentSortColumn = sortBy;
          currentSortOrder = sortOrder;
  
          // Fetch data with the updated sort parameters
          fetchData(currentPage, $('#searchInput').val(), currentSortColumn, currentSortOrder, v1, v2);
      }
  
      // Event listener for column header clicks
      $('#tableHeaders th.sortable').click(function() {
          var columnName = $(this).data('column');
          handleSort(columnName);
      });
  
      // Fetch data for the initial page
      fetchData(currentPage, '', currentSortColumn, currentSortOrder, v1, v2);
  });
  
})
