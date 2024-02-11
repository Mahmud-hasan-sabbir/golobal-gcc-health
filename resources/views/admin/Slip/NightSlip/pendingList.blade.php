<div class="content">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center">Night Slip List</h2>
      </div>
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
          {{-- <button type="button" class="mb-1 btn btn-pill btn-success" onclick="NightSlip.creatSlip()">+ Create Night Slip</button> --}}
        </div>
      </div>
    </div>
    <div class="card card-default">
      <table class="table table-striped table-class" id="table-id">
        <thead>
          <tr>
            <th>User Name</th>
            <th>Passport No</th>
            <th>GCC Country</th>
            <th>City</th>
            <th>Status</th>
            <th>Remarks</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($penddingList as $key => $item)
          <tr>
            <td>{{ $item['user'] ?  $item['user']['name'] : 'No User'}}</td>
            <td>{{ $item['passport_no'] }}</td>
            <td>{{ $item['traveling_to'] }}</td>
            <td>{{ $item['city_from'] }}</td>
            <td>{{ $item['status'] }}</td>
            <td>{{ $item['comments'] }}</td>
            <td>
                <button type="submit" data-id="{{ $item['id'] }}" data-status="Progress" onclick="PendingCanacel.status($(this))" title="In Progress">
                    <i class="mdi mdi-progress-check"></i>
                </button>
                <button type="button" data-toggle="modal"
              data-target="#exampleModallarge" data-id="{{ $item['id'] }}" onclick="PendingCanacel.view($(this))" title="View">
              <i class="mdi mdi-view-array"></i>
            </button>
            <button type="submit" data-id="{{ $item['id'] }}" data-status="reject" onclick="PendingCanacel.status($(this))" title="Return">
              <i class="mdi mdi-send"></i>
          </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table> 
      <div class="modal fade" id="exampleModallarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLarge">Night Slip Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           
          </div>
        </div>
      </div>
    </div>
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
  
  var PendingCanacel = {
    status: function(elem){
      $('#loader').removeClass('hidden')
      id = elem.data('id');
      status = elem.data('status');
      let url = '{{route('update-night-slip-status')}}';
      let data = {id,status};
      ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
          if (response.status === 'error') {
              console.log(response.data);
              $('#loader').addClass('hidden')
          } else {
            $('.penddingnightSlip').click();
            $('#loader').addClass('hidden')
          }
      });
    },
    view: function(elem){
      $('#loader').removeClass('hidden')
      id = elem.data('id');
      let url = '{{route('view-night-slip')}}';
      let data = {id};
      ajaxCallAsyncCallbackAPI(url, data, 'POST', function (response) {
        if (response.status === 'error') {
            toastr.warning(response.data)
            $('#loader').addClass('hidden')
        } else {
            $('.modal-body').html(response);
            $('#loader').addClass('hidden')
        }
      });
    }
  }
  </script>