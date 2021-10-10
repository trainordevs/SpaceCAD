<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow h-100 py-2 text-center">
            <div class="card-body">
                <p><button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#boloModal">Create BOLO</button></p>
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php if(BOLO::getCount() == 0): ?>
                        <div class="text-xs font-weight-bold text-uppercase mb-1">There are no active bolos
                            at this time.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="boloModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">BOLO</h5>
            </div>
            <div class="modal-body">
                <form class="user">
                    <div class="form-group">
                        <select class="form-control form-select" aria-label="Please select a type...">
                            <option selected disabled>Please select a type...</option>
                            <option value="person">Person</option>
                            <option value="vehicle">Vehicle</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="" placeholder="Last Known Location">
                    </div>
                    <div class="form-group">
                        <label for="wantedDesc">Description</label>
                        <textarea class="form-control" name="wantedDesc" id="wantedDesc" cols="30" rows="10"></textarea>
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                        Create
                    </a>
                    <button type="button" class="btn btn-secondary btn-user btn-block"
                        data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#myTab a").click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
});

$("#datepicker").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:-18"
});

$("#search").keyup(function() {
    if(!$("#search").val()) {
        $("#searchResults").html("");
    } else {
        $.ajax({    
            type: "POST",
            url: "/search",             
            dataType: "html",
            data: { search: $("#search").val() },
            success: function(data){
                $("#searchResults").html(data);
            }
        });
    }
});
</script>