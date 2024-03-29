<?php
include_once 'header.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/Module.php';
include_once '../src/model/request.php';
include_once '../src/controller/RequestController.php';

if(!isset($db)) {
    $db = new DbContext();
}
if(isset($_POST['submit_Request'])) {
    $request = new request($_POST['Name'], $_POST['Room'], $_POST['Row'], $_POST['Seat'], $_POST['Problem'], $_POST['ModuleID']);
    $success = $db->Enter_Request($request);
}
?>

<body>

<div class="container-fluid mt-5 px-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">Request</div>
                <div class="card-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <select class="custom-select mr-sm-2 form-control" name="ModuleID">
                                    <option value="">--Select Module Code--</option>
                                    <?php
                                        $optionString = "";
                                        $modules = $db->Modules();

                                        if($modules)
                                        {
                                            foreach($modules as $module)
                                            {
                                                $optionString .= "<option value=".$module->Id().">".$module->Code()."</option>";
                                            }
                                        }
                                        echo $optionString;
                                    ?>
                                </select>
                            </div>
                            <label for="Modules" class="col-sm-2 col-form-label">Module Code</label>
                            <div class="col-sm-2">
                                <span class="btn btn-warning">Current Date Time</span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-8">
                                <input type="text" name="Name" placeholder="Name" class="form-control" />
                            </div>
                            <label for="StudentName" class="col-sm-2 col-form-label">Your Name</label>
                            <div class="col-sm-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="custom-select mr-sm-2" name="Row">
                                    <option selected>Choose...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="13">3</option>
                                    <option value="14">4</option>
                                    <option value="15">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <label for="Row" class="col-sm-1 col-form-label">Row</label>
                            <div class="col-sm-3">
                                <select class="custom-select mr-sm-2" name="Seat">
                                    <option selected>Choose...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <label for="Seat" class="col-sm-1 col-form-label">Seat</label>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span class="btn btn-warning">Room</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                                <select class="custom-select mr-sm-2" name="Room">
                                    <option selected>Choose...</option>
                                    <option value="SMB109">SMB 109</option>
                                    <option value="SMB101">SMB 101</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <textarea rows="3" name="Problem" placeholder="Problem Statement" class="form-control"></textarea>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success" name="submit_Request">Submit</button>
                            </div>
                            <div class="col-sm-2"> <button type="reset" class="btn btn-danger">Cancel</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php
    $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><div class=\"card border-success mb-3\">
                <div class=\"card-header bg-success text-white\">Your Request has been raised successfully</div></div></div></div>";
    if ($success > 0) {
        echo $resultString;
        alert($request);
    };

    ?>
</div>

<?php
 include_once 'footer.php';
?>