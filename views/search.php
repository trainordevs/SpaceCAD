<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow h-100 py-2 text-center">
            <div class="card-body">
                <p class="text-center">You may search for a civilian by full name, vehicle by plate, or firearm by serial number.</p>
                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Name/Plate/Serial">
                    </div>
                </form>
                <br>
                <div class='row'>
                    <div class='col' id='firearms'>
                        <p class='text-center'><strong>Firearms</strong></p>
                        <p>No firearms match that search query.</p>
                    </div>
                    <div class='col' id='civilians'>
                        <p class='text-center'><strong>Civilians</strong></p>
                        <p>No civilians match that search query.</p>
                    </div>
                    <div class='col' id='vehicles'>
                        <p class='text-center'><strong>Vehicles</strong></p>
                        <p>No vehicles match that search query.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$("#search").keyup(function() {
    if(!$("#search").val()) {
        $("#searchResults").html("");
    } else {
        $.ajax({    
            type: "POST",
            url: "/search/firearms",             
            dataType: "html",
            data: { search: $("#search").val() },
            success: function(data){
                $("#firearms").html(data);
            }
        });
        $.ajax({    
            type: "POST",
            url: "/search/civilians",             
            dataType: "html",
            data: { search: $("#search").val() },
            success: function(data){
                $("#civilians").html(data);
            }
        });
        $.ajax({    
            type: "POST",
            url: "/search/vehicles",             
            dataType: "html",
            data: { search: $("#search").val() },
            success: function(data){
                $("#vehicles").html(data);
            }
        });
    }
});
</script>