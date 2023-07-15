<!-- Modal -->
<?php
// $office_name = "Guidance Office";
// include "../../conn.php";

// $query = "SELECT student_no, last_name, first_name, middle_name, extension_name FROM users
// WHERE user_id = ?";
// $stmt = $connection->prepare($query);
// $stmt->bind_param("i", $_SESSION['user_id']);
// $stmt->execute();
// $result = $stmt->get_result();
// $userData = $result->fetch_all(MYSQLI_ASSOC);
// $stmt->close();

// $stmt->close();
// $connection->close();
?>
<form method="POST">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog editmod" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Personal Information</h5>
        <button type="button" class="btn-close upload" data-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      
      <form action="generatepdf_so.php" method="POST" target="_blank">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="input1">First Name</label>
                <input type="text" maxlength="50" class="form-control" id="input1" name="first_name">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="input2">Middle</label>
                <input type="text" maxlength="50" class="form-control" id="input2" name="middle_name">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="input3">Last Name</label>
                <input type="text" maxlength="100" class="form-control" id="input3" name="last_name">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="input4">Suffix</label>
                <input type="text" maxlength="5" class="form-control" id="input4" name="suffix">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="input5">Student Number</label>
                <input type="text" maxlength="50"  class="form-control" id="input15" name="studentNumber">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="input6">Yr&Sec</label>
                <input type="text" maxlength="10" class="form-control" id="input6" name="yrSec">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="input7">Academic Year</label>
                <input type="text" pattern="20[2-9][0-9]-20[2-9][0-9]" maxlength="9" class="form-control" id="input7" name="acadYear">
              </div>
            </div>
          </div>

          <div class="row">
    <div class="col-md-3">
      <div class="form-check">
      <input class="form-check-input" type="radio" name="semester" id="radio1" value="1st Sem" checked>
        <label class="form-check-label" for="radio1">
          1st Sem
        </label>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="semester" id="radio2" value="2nd Sem">
        <label class="form-check-label" for="radio2">
          2nd Sem
        </label>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="semester" id="radio3" value="Summer">
        <label class="form-check-label" for="radio3">
          Summer
        </label>
      </div>
    </div>
  </div>

  <div class="col-md-12">
              <div class="form-group">
                <label for="input8">Reason for Subject Overload</label>
                <input type="text" maxlength="50" class="form-control" id="input8" name="reason">
              </div>
            </div>

<br/><h6>Add Subject/s</h6>

<div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="input9">Code</label>
                <input type="text" maxlength="10" class="form-control" id="input9" name="code1">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="input10">Description</label>
                <input type="text" maxlength="30" class="form-control" id="input10" name="des1">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="input11">Course/Yr/Sec</label>
                <input type="text" maxlength="15" class="form-control" id="input11" name="courseYrSec1">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="input12">Units</label>
                <input type="number" maxlength="2" class="form-control" id="input12" name="units1">
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="input9">Code</label>
                <input type="text" maxlength="10"  class="form-control" id="input9" name="code2">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="input10">Description</label>
                <input type="text" maxlength="10"  class="form-control" id="input10" name="des2">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="input11">Course/Yr/Sec</label>
                <input type="text" maxlength="10"  class="form-control" id="input11" name="courseYrSec2">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="input12">Units</label>
                <input type="number" maxlength="10"  class="form-control" id="input12" name="units2">
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="input9">Code</label>
                <input type="text" maxlength="10"  class="form-control" id="input9" name="code3">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="input10">Description</label>
                <input type="text" maxlength="10"  class="form-control" id="input10" name="des3">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="input11">Course/Yr/Sec</label>
                <input type="text" maxlength="10"  class="form-control" id="input11" name="courseYrSec3">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="input12">Units</label>
                <input type="number" maxlength="10"  class="form-control" id="input12" name="units3">
              </div>
            </div>
        </div>

        </div>
    </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit">Submit</button>
      </div>

      </form>
    </div>
  </div>
</div>
  </form>