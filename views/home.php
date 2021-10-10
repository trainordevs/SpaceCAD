<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow h-100 py-2 text-center">
            <div class="card-body">
                <p><button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#boloModal">Create BOLO</button></p>
                <div class="row no-gutters align-items-center">
                    <div class='col mr-2 text-center'>
                        <?php
                            if(BOLO::getCount(['active' => 'True']) == 0) {
                                ?> <div class="text-xs font-weight-bold text-uppercase mb-1">There are no active bolos
                            at this time.</div> <?php
                            } else {
                                echo "<h3>Active BOLOs [" . BOLO::getCount(['active' => 'True']) . "]</h3>";
                                echo "<table class='bolo'>";
                                echo "<tr><th>Type</th><th>Last Known Location</th><th>Description</th><th>Actions</th></tr>";
                                $bolos = BOLO::getAll(['active' => 'True']);
                                
                                foreach($bolos as $bolo) {
                                    echo "<tr>";
                                    echo "<td>" . strtoupper($bolo->getType()) . "</td>";
                                    echo "<td>" . strtoupper($bolo->getLastKnownLocation()) . "</td>";
                                    echo "<td>" . $bolo->getDescription() . "</td>";
                                    echo "<td><form action='/bolo/clear' method='POST'><input type='hidden' name='id' value='".$bolo->getId()."' /><button type='submit' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'>Clear.</button></form></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                        ?>
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
                <form class="user" action="/bolo/create" method="POST">
                    <div class="form-group">
                        <select class="form-control form-select" name="type" id="type"
                            aria-label="Please select a type...">
                            <option selected disabled>Please select a type...</option>
                            <option value="person">Person</option>
                            <option value="vehicle">Vehicle</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="lkl" id="lkl" placeholder="Last Known Location">
                    </div>
                    <div class="form-group">
                        <label for="wantedDesc">Description</label>
                        <textarea class="form-control" name="wantedDesc" id="wantedDesc" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Create
                    </button>
                    <button type="button" class="btn btn-secondary btn-user btn-block"
                        data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>