<div class="content">
    <div class="card">
      <div class="px-6 py-4 row">
        <div class="form-group col-xl-4">
          <!--		Show Numbers Of Rows 		-->
          <select class="form-control" name="state" id="maxRows">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="70">70</option>
            <option value="100">100</option>
            <option value="5000">Show ALL Rows</option>
          </select>
        </div>
        <div class="tb_search col-xl-5">
          <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control" />
        </div>
        <div class="col-xl-3">
          <button type="button" class="mb-1 btn btn-pill btn-success" onclick="jobContiner.add()">+ Add Hospital</button>
        </div>
      </div>
    </div>
    <div class="card card-default">
      <table class="table table-striped table-class" id="table-id">
        <thead>
          <tr>
            <th>Name</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($hospital as $key => $item)
          <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['payment'] }}</td>
            <td>{{ $item['status'] == 1 ? 'Active' : 'InActive' }}</td>
            <td>
              <button type="submit" data-id="{{ $item['id'] }}" onclick="jobContiner.edit($(this))"><i class="mdi mdi-circle-edit-outline"></i></button>
              <button type="submit" data-id="{{ $item['id'] }}" onclick="jobContiner.delete($(this))"><i class="mdi mdi-delete"></i></button>
              <button type="submit" data-id="{{ $item['id'] }}" data-status="{{ $item['status'] }}" onclick="jobContiner.status($(this))"><i class="mdi mdi-thermostat"></i></button>
             
            </td>
          </tr>
          @endforeach
        </tbody>
      </table> 
      {{-- <div class='pagination-container'>
        <nav>
          <ul class="pagination">
           <!--	Here the JS Function Will Add the Rows -->
          </ul>
        </nav>
      </div> --}}
  </div>    
    </div>
  </div>
  <div class="card card-default align-items-center">
    <div class="card-body">
      <div style="padding: 8px;" class="rows_count">Showing 11 to 20 of 91 entries</div>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
          </ul>
        </nav>
    </div>
  </div>
  <!--  Developed By Yasser Mas -->
  <script>
      getPagination('#table-id');
      $('#maxRows').trigger('change');
      function getPagination (table){
  
            $('#maxRows').on('change',function(){
                $('.pagination').html('');						// reset pagination div
                var trnum = 0 ;									// reset tr counter 
                var maxRows = parseInt($(this).val());			// get Max Rows from select option
          
                var totalRows = $(table+' tbody tr').length;		// numbers of rows 
               $(table+' tr:gt(0)').each(function(){			// each TR in  table and not the header
                   trnum++;									// Start Counter 
                   if (trnum > maxRows ){						// if tr number gt maxRows
                       
                       $(this).hide();							// fade it out 
                   }if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
               });											//  was fade out to fade it in 
               if (totalRows > maxRows){						// if tr total rows gt max rows option
                   var pagenum = Math.ceil(totalRows/maxRows);	// ceil total(rows/maxrows) to get ..  
                                                               //	numbers of pages 
                   for (var i = 1; i <= pagenum ;){			// for each page append pagination li 
                   $('.pagination').append('<li class="page-item" data-page="'+i+'">\
                                        <a class="page-link">'+ i++ +'</a>\
                                      </li>').show();
                   }											// end for i 
       
           
              } 												// end if row count > max rows
              $('.pagination li:first-child').addClass('active'); // add active class to the first li 
          
          
          //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
         showig_rows_count(maxRows, 1, totalRows);
          //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
  
          $('.pagination li').on('click',function(e){		// on click each page
          e.preventDefault();
                  var pageNum = $(this).attr('data-page');	// get it's number
                  var trIndex = 0 ;							// reset tr counter
                  $('.pagination li').removeClass('active');	// remove active class from all li 
                  $(this).addClass('active');					// add active class to the clicked 
          
          
          //SHOWING ROWS NUMBER OUT OF TOTAL
         showig_rows_count(maxRows, pageNum, totalRows);
          //SHOWING ROWS NUMBER OUT OF TOTAL
          
          
          
                   $(table+' tr:gt(0)').each(function(){		// each tr in table not the header
                       trIndex++;								// tr index counter 
                       // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                       if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                           $(this).hide();		
                       }else {$(this).show();} 				//else fade in 
                   }); 										// end of for each tr in table
                      });										// end of on click pagination list
          });
                                              // end of on select change 
                              // END OF PAGINATION 
      
      }	
  
  
  
  // SI SETTING
  $(function(){
      // Just to append id number for each row  
  default_index();
                      
  });
  
  //ROWS SHOWING FUNCTION
  function showig_rows_count(maxRows, pageNum, totalRows) {
     //Default rows showing
          var end_index = maxRows*pageNum;
          var start_index = ((maxRows*pageNum)- maxRows) + parseFloat(1);
          var string = 'Showing '+ start_index + ' to ' + end_index +' of ' + totalRows + ' entries';               
          $('.rows_count').html(string);
  }
  
  // CREATING INDEX
  function default_index() {
    $('table tr:eq(0)').prepend('<th> ID </th>')
  
                      var id = 0;
  
                      $('table tr:gt(0)').each(function(){	
                          id++
                          $(this).prepend('<td>'+id+'</td>');
                      });
  }
  
  // All Table search script
  function FilterkeyWord_all_table() {
    
  // Count td if you want to search on all table instead of specific column
  
    var count = $('.table').children('tbody').children('tr:first-child').children('td').length; 
  
          // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("search_input_all");
    var input_value =     document.getElementById("search_input_all").value;
          filter = input.value.toLowerCase();
    if(input_value !=''){
          table = document.getElementById("table-id");
          tr = table.getElementsByTagName("tr");
  
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 1; i < tr.length; i++) {
            
            var flag = 0;
             
            for(j = 0; j < count; j++){
              td = tr[i].getElementsByTagName("td")[j];
              if (td) {
               
                  var td_text = td.innerHTML;  
                  if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                  //var td_text = td.innerHTML;  
                  //td.innerHTML = 'shaban';
                    flag = 1;
                  } else {
                    //DO NOTHING
                  }
                }
              }
            if(flag==1){
                       tr[i].style.display = "";
            }else {
               tr[i].style.display = "none";
            }
          }
      }else {
        //RESET TABLE
        $('#maxRows').trigger('change');
      }
  }
  
  var jobContiner = {
    add: function(){
      $('#loader').removeClass('hidden')
      url = '{{route('hospital-create')}}';
      data = {};
      ajaxCallAsyncCallbackAPI(url, data, 'GET', function (response) {
          if (response.status === 'error') {
              toastr.warning(response.data)
              $('#loader').addClass('hidden')
          } else {
              $('.content-wrapper').html(response);
              $('#loader').addClass('hidden')
          }
      })
    },
    edit: function(elem){
      id = elem.data('id');
      $('#loader').removeClass('hidden')
      url = '{{route('hospital-edit')}}';
      data = {id};
      ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
          if (response.status === 'error') {
              toastr.warning(response.data)
              $('#loader').addClass('hidden')
          } else {
              $('.content-wrapper').html(response);
              $('#loader').addClass('hidden')
          }
      })
    },
    delete: function(elem){
      $('#loader').removeClass('hidden')
      id = elem.data('id');
      let url = '{{route('hospital-delete')}}';
      let data = {id};
      ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
          if (response.status === 'error') {
              console.log(response.data);
              $('#loader').addClass('hidden')
          } else {
            $('#loader').addClass('hidden')
            $('.addHospital').click();
          }
      });
     },
     status: function(elem){
      $('#loader').removeClass('hidden')
      id = elem.data('id');
      status = elem.data('status');
      status = status == 1 ? 0 : 1;
      let url = '{{route('hospital-status')}}';
      let data = {id,status};
      ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
          if (response.status === 'error') {
              console.log(response.data);
              $('#loader').addClass('hidden')
          } else {
            $('#loader').addClass('hidden')
            $('.addHospital').click();
          }
      });
     }
  }
  </script>