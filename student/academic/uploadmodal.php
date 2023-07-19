<!-- ACTION - UPLOAD MODAL -->
<?php
include "../../conn.php";

$query = "SELECT student_no, last_name, first_name FROM users WHERE user_id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Attach File (10MB size limit)</h5>
        <button type="button" class="btn-close upload" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Browse from device:
        <br/>
        <div class="uploadbox" id="uploadDiv">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <i class="fa-solid fa-upload fa-4x"></i>
            <input type="file" name="fileToUpload" id="hiddenFileInput" style="display:none">
            <input type="hidden" id="input1" name="student_no" value="<?php echo htmlspecialchars($userData[0]['student_no'], ENT_QUOTES); ?>">
            <input type="hidden" id="input2" name="last_name" value="<?php echo htmlspecialchars($userData[0]['last_name'], ENT_QUOTES); ?>">
            <input type="hidden" id="input3" name="first_name" value="<?php echo htmlspecialchars($userData[0]['first_name'], ENT_QUOTES); ?>">

        </div>
        <span class="uploadsubtext">Note: If possible, please use a stable internet connection to avoid errors when uploading. Sudden interruptions/spike may cause it to fail.</span>
      </div>
      <div class="modal-footer">
      <input type="button" value="Upload File" name="submit" id="uploadSubmit" class="btn btn-primary submit">
            </form>
      </div>
    </div>
  </div>
</div>

<!-- File upload success modal -->
<!-- <div id="fileUploadSuccessModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fileUploadSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileUploadSuccessModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>File uploaded successfully!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div> -->

<!-- File upload failed modal -->
<div id="fileUploadFailedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fileUploadFailedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileUploadFailedModalLabel">Upload failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>File cannot be uploaded. Please try again.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
  
</script>

