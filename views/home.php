<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
        data-bs-target="#searchModal">Search</button>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Civilians</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Civilian::getCount(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Vehicles</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Vehicle::getCount(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Firearms</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Firearm::getCount(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class="h3 mb-0 text-gray-800">Active BOLOs</h2>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
        data-bs-target="#boloModal">Create BOLO</button>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow h-100 py-2 text-center">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php if(BOLO::getCount() == 0): ?>
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">There are no active bolos
                            at this time.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class="h3 mb-0 text-gray-800">Registrations</h2>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow h-100 py-2 text-center">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <ul id="myTab" class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a href="#home" class="nav-link active">Civilian</a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" class="nav-link">Vehicle</a>
                            </li>
                            <li class="nav-item">
                                <a href="#messages" class="nav-link">Firearm</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home">
                                <form class="user" action="/civilian/create" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="fullName" name="fullName"
                                            placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select" aria-label="Please select a gender..."
                                            id="gender" name="gender" required>
                                            <option selected disabled>Please select a gender...</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="datepicker" name="datepicker"
                                            placeholder="Date of Birth" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select license status..." id="license" name="license"
                                            required>
                                            <option selected disabled>Please select license status...</option>
                                            <option value="valid">Valid</option>
                                            <option value="suspended">Suspended</option>
                                            <option value="perrev">Permanently Revoked</option>
                                            <option value="none">None</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Create">
                                </form>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <form class="user" action="/vehicle/create" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="plateNo" name="plateNo"
                                            placeholder="Plate No." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="make" name="make" placeholder="Make"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="model" name="model"
                                            placeholder="Model" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select a registration status..." id="registration"
                                            name="registration" required>
                                            <option selected disabled>Please select a registration status...</option>
                                            <option value="valid">Valid</option>
                                            <option value="invalid">In-valid</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select a insurance status..." id="insurance"
                                            name="insurance" required>
                                            <option selected disabled>Please select an insurance status...</option>
                                            <option value="valid">Valid</option>
                                            <option value="invalid">In-valid</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select the registered owner..." id="owner" name="owner"
                                            required>
                                            <option selected disabled>Please select the registered owner...</option>
                                            <option value="1">Mark Wolfy</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Create">
                                </form>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail"
                                            aria-describedby="emailHelp" placeholder="Serial No.">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select a registration status...">
                                            <option selected disabled>Please select a weapon type...</option>
                                            <option value="valid">Melee</option>
                                            <option value="valid">Handgun</option>
                                            <option value="valid">Shotgun</option>
                                            <option value="valid">Submachine Gun</option>
                                            <option value="valid">Light Machine Gun</option>
                                            <option value="valid">Assault Rifle</option>
                                            <option value="valid">Sniper Rifle</option>
                                            <option value="valid">Heavy Weapon</option>
                                            <option value="valid">Thrown Weapon</option>
                                            <option value="valid">Special Weapon</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select a registration status...">
                                            <option selected disabled>Please select a registration status...</option>
                                            <option value="valid">Valid</option>
                                            <option value="invalid">In-valid</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-select"
                                            aria-label="Please select a registration status...">
                                            <option selected disabled>Please select the registered owner...</option>
                                            <option value="1">Mark Wolfy</option>
                                        </select>
                                    </div>
                                    <a href="index.html" class="btn btn-primary btn-user btn-block">Create</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="searchModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search</h5>
            </div>
            <div class="modal-body">
                <p class="text-center">You may search for a civilian by full name, vehicle by plate, or firearm by
                    serial
                    number.</p>
                <form class="user">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Name/Plate/Serial">
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                        Lookup
                    </a>
                    <button type="button" class="btn btn-secondary btn-user btn-block"
                        data-bs-dismiss="modal">Close</button>
                </form>
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
</script>