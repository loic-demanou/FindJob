$(document).ready(function(){
        
    $(document).on('click', '.pagination a', function(event){
     event.preventDefault(); 
     var page = $(this).attr('href').split('page=')[1];
     fetch_data(page);
    //  alert(page);
    });
   
    function fetch_data(page)
    {
     $.ajax({
      url:"/pagination/fetch_data?page="+page,
      success:function(data)
      {
       $('#updateDiv').html(data);
      }
     });
    }
    
   });
