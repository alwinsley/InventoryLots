
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/responsejs/response.min.js"></script>
<script src="libs/loading-overlay/loadingoverlay.min.js"></script>
<script src="libs/tether/js/tether.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>
<script src="libs/jscrollpane/jquery.jscrollpane.min.js"></script>
<script src="libs/jscrollpane/jquery.mousewheel.js"></script>
<script src="libs/flexibility/flexibility.js"></script>
<script src="libs/noty/noty.min.js"></script>
<script src="libs/velocity/velocity.min.js"></script>
<script src="libs/flatpickr/flatpickr.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="application/javascript">
    (function ($) {
        $(document).ready(function() {
            $('.flatpickr').flatpickr();
            $("#flatpickr-disable-range").flatpickr({
                disable: [
                    {
                        from: "2016-08-16",
                        to: "2016-08-19"
                    },
                    "2016-08-24",
                    new Date().fp_incr(30) // 30 days from now
                ]
            });
        });
    })(jQuery);
    </script>

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/scripts/common.min.js"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="libs/bootstrap-table/bootstrap-table.min.js"></script>
<script src="libs/select2/js/select2.min.js"></script>
<script type="application/javascript">
(function ($) {
    $(document).ready(function() {
        $('#ks-datatable').bootstrapTable({
            icons: {
                refresh: 'la la-refresh icon-refresh',
                toggle: 'la la-list-alt icon-list-alt',
                columns: 'la la-th icon-th',
                share: 'la la-download icon-share'
            }
        });
    });
})(jQuery);
</script>

<script>
  // status color
  if($('.statuscolor').text() === "Hold"){
    $('.statuscolor').css('color', 'red');
  } else if($('#statuscolor').text() === "Executed"){
    $('.statuscolor').css('color', 'green');
  }else{
    $('.statuscolor').css('color', 'black');
  }

   if($('#statuscolor').text() == 'Sent'){
    $('#statuscolor').css('color', 'yellow');
  }

   if($('#statuscolor').text() == 'Executed'){
    $('#statuscolor').css('color', 'green');
  }

  if($('#statuscolor').text() == 'Not Interested'){
    $('#statuscolor').css('color', 'grey');
  }
</script>


<script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>



<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<script>
        if($('.userEmail').html() === "<span style='color:grey;font-size:10px;'>Email: </span> winsleyal@gmail.com"){
            $('.userAvatar').html("<span style='color:grey;font-size:10px;'>Email: </span> <img src='./assets/img/avatars/alPic.jpg' />");
        }

        console.log($('.userEmail').html());

</script>


<script>
    function fill(Value) {
 
 //Assigning value to "search" div in "search.php" file.

 $('#search').val(Value);

 //Hiding "display" div in "search.php" file.

 $('#display').hide();

}

$(document).ready(function() {

 //On pressing a key on "Search box" in "search.php" file. This function will be called.

 $("#search").keyup(function() {

     //Assigning search box value to javascript variable named as "name".

     var name = $('#search').val();

     //Validating, if "name" is empty.

     if (name == "") {

         //Assigning empty value to "display" div in "search.php" file.

         $("#display").html("");

     }

     //If name is not empty.

     else {

         //AJAX is called.

         $.ajax({

             //AJAX type is "Post".

             type: "POST",

             //Data will be sent to "ajax.php".

             url: "ajax.php",

             //Data, that will be sent to "ajax.php".

             data: {

                 //Assigning value of "name" into "search" variable.

                 search: name

             },

             //If result found, this funtion will be called.

             success: function(html) {

                 //Assigning result to "display" div in "search.php" file.

                 $("#display").html(html).show();

             }

         });

     }

 });

});
</script>



<div class="ks-mobile-overlay"></div>


</body>
</html>